import { useEffect, useMemo, useState } from 'react'
import { PanelLeft } from 'lucide-react'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { Skeleton } from '@/components/ui/skeleton'
import type { RuntimeServices } from '@/app/providers/AppProvider'
import type { ApplicationSchema, NavigationGroup, NavigationItem } from '@/core/application/types'
import { useApplicationPage, useApplicationSchema } from '@/core/application/queries'
import { normalizeNavigation, isNavigationGroup } from '@/core/navigation/normalizeNavigation'
import { RouteResolver } from '@/core/runtime/RouteResolver'
import { PageRenderer } from '@/runtime/page/PageRenderer'

type NavigationEntry = NavigationItem | NavigationGroup

export function ApplicationRuntime({ runtime }: { runtime: RuntimeServices }) {
  const schemaQuery = useApplicationSchema(runtime.applicationApi)
  const application = schemaQuery.data?.data.application
  const schema = schemaQuery.data?.data.schema
  const routeResolver = useMemo(
    () => application ? new RouteResolver({ applicationPath: application.path }) : null,
    [application?.path],
  )
  const [currentRoute, setCurrentRoute] = useState<string | null>(null)

  useEffect(() => {
    if (!routeResolver || !schema) return
    const sync = () => setCurrentRoute(routeResolver.currentRoute(schema.root))
    sync()
    window.addEventListener('popstate', sync)
    return () => window.removeEventListener('popstate', sync)
  }, [routeResolver, schema])

  useEffect(() => {
    if (!routeResolver || !schema) return
    if (!routeResolver.fromPath(window.location.pathname) && schema.root) routeResolver.navigate(schema.root)
  }, [routeResolver, schema])

  const pageQuery = useApplicationPage(runtime.applicationApi, currentRoute)

  if (schemaQuery.isPending) return <RuntimeLoading />
  if (schemaQuery.isError) return <RuntimeError error={schemaQuery.error} />
  if (!application || !schema || !routeResolver) return null

  const navigation = normalizeNavigation(schema.navigation)
  const navigate = (route: string) => routeResolver.navigate(route)

  return (
    <div className="flex h-screen overflow-hidden bg-background text-foreground">
      <aside className="hidden w-72 shrink-0 border-r bg-sidebar md:flex md:flex-col">
        <div className="border-b p-5">
          <div className="flex items-center gap-3">
            <div className="flex size-9 items-center justify-center rounded-lg bg-sidebar-primary text-sm font-semibold text-sidebar-primary-foreground">{application.name.slice(0, 1).toUpperCase()}</div>
            <div className="min-w-0"><p className="truncate font-semibold">{application.name}</p><p className="text-xs text-muted-foreground">{application.path}</p></div>
          </div>
        </div>
        <nav className="flex-1 overflow-auto p-3"><Navigation entries={navigation} currentRoute={currentRoute} onNavigate={navigate} /></nav>
        <div className="border-t p-4 text-xs text-muted-foreground">QuickCMS Runtime</div>
      </aside>

      <div className="flex min-w-0 flex-1 flex-col">
        <header className="flex h-14 shrink-0 items-center gap-3 border-b px-4"><PanelLeft className="size-4" /><div className="h-5 w-px bg-border" /><span className="text-sm text-muted-foreground">{application.name}</span><span className="text-muted-foreground">/</span><span className="text-sm font-medium">{currentRoute ?? schema.root ?? 'home'}</span></header>
        {pageQuery.isPending ? <PageLoading /> : pageQuery.isError ? <RuntimeError error={pageQuery.error} /> : pageQuery.data ? <PageRenderer page={pageQuery.data.data.page} /> : null}
      </div>
    </div>
  )
}

function Navigation({ entries, currentRoute, onNavigate }: { entries: NavigationEntry[]; currentRoute: string | null; onNavigate: (route: string) => void }) {
  return <div className="space-y-5">{entries.map((entry, index) => isNavigationGroup(entry) ? (
    <section key={entry.id ?? `${entry.label}-${index}`} className="space-y-2"><p className="px-2 text-xs font-medium text-muted-foreground">{entry.label}</p><div className="space-y-1">{entry.items.map((item) => <NavigationItem key={`${item.route ?? item.url ?? item.label}`} item={item} currentRoute={currentRoute} onNavigate={onNavigate} />)}</div></section>
  ) : <NavigationItem key={`${entry.route ?? entry.url ?? entry.label}`} item={entry} currentRoute={currentRoute} onNavigate={onNavigate} />)}</div>
}

function NavigationItem({ item, currentRoute, onNavigate }: { item: NavigationItem; currentRoute: string | null; onNavigate: (route: string) => void }) {
  const active = Boolean(item.route && item.route === currentRoute)
  return <button type="button" onClick={() => item.route && onNavigate(item.route)} disabled={!item.route} className={`flex w-full items-center gap-3 rounded-md px-3 py-2 text-left text-sm transition-colors ${active ? 'bg-sidebar-accent font-medium text-sidebar-accent-foreground' : 'text-sidebar-foreground hover:bg-sidebar-accent hover:text-sidebar-accent-foreground'} ${!item.route ? 'cursor-default opacity-70' : ''}`}><span className="size-2 rounded-full bg-current opacity-50" /><span className="min-w-0 flex-1 truncate">{item.label}</span>{item.badge ? <span className="text-xs">{String(item.badge)}</span> : null}</button>
}

function RuntimeLoading() { return <div className="flex h-screen items-center justify-center p-6"><Card className="w-full max-w-md"><CardHeader><CardTitle>Connecting to QuickCMS</CardTitle></CardHeader><CardContent className="space-y-3"><Skeleton className="h-4 w-3/4" /><Skeleton className="h-4 w-1/2" /></CardContent></Card></div> }
function PageLoading() { return <main className="flex-1 p-6 lg:p-8"><div className="mx-auto max-w-7xl space-y-6"><Skeleton className="h-4 w-28" /><Skeleton className="h-10 w-64" /><Skeleton className="h-5 w-96" /><Skeleton className="h-72 w-full" /></div></main> }
function RuntimeError({ error }: { error: unknown }) { const message = error instanceof Error ? error.message : 'Unknown runtime error.'; return <div className="flex h-full items-center justify-center p-6"><Card className="w-full max-w-xl border-destructive/30"><CardHeader><CardTitle>Unable to load QuickCMS</CardTitle></CardHeader><CardContent className="space-y-2 text-sm"><p className="text-destructive">{message}</p><p className="text-muted-foreground">Check the API URL, application name, and backend CORS configuration.</p></CardContent></Card></div> }
