import { ChevronRight } from 'lucide-react'
import type { ApplicationLayoutProps, NavigationItem } from '@/runtime/contracts/layout'

function itemsOf(navigation: ApplicationLayoutProps['application']['navigation']): NavigationItem[] {
  if (!navigation) return []
  if (Array.isArray(navigation)) return navigation
  if (Array.isArray(navigation.items)) return navigation.items
  if (Array.isArray(navigation.groups)) return navigation.groups.flatMap((group) => group.items)
  return []
}

export function TopNavigationLayout({ application, currentPath, children, onNavigate }: ApplicationLayoutProps) {
  const items = itemsOf(application.navigation)
  const title = application.title ?? application.name ?? 'Application'

  return (
    <div className="min-h-screen bg-background text-foreground">
      <header className="border-b bg-background">
        <div className="mx-auto flex min-h-14 max-w-7xl items-center gap-6 px-6">
          <div className="font-semibold">{title}</div>
          <nav className="flex min-w-0 flex-1 items-center gap-1 overflow-x-auto">
            {items.filter((item) => item.visible !== false).map((item) => {
              const target = item.route ?? item.url
              if (!target) return null
              const active = currentPath === target || currentPath.replace(/\/$/, '') === target.replace(/\/$/, '')
              return (
                <button
                  key={`${target}-${item.label}`}
                  type="button"
                  onClick={() => onNavigate?.(target)}
                  className={`rounded-md px-3 py-2 text-sm transition-colors ${active ? 'bg-accent font-medium text-accent-foreground' : 'text-muted-foreground hover:bg-accent hover:text-accent-foreground'}`}
                >
                  {item.label}
                </button>
              )
            })}
          </nav>
          <span className="hidden text-xs text-muted-foreground lg:inline">{currentPath}</span>
        </div>
      </header>
      <main>{children}</main>
    </div>
  )
}
