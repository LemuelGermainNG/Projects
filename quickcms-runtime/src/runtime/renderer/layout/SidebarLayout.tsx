import { ChevronRight, PanelLeft } from 'lucide-react'
import {
  Sidebar,
  SidebarContent,
  SidebarFooter,
  SidebarGroup,
  SidebarGroupContent,
  SidebarGroupLabel,
  SidebarHeader,
  SidebarInset,
  SidebarMenu,
  SidebarMenuButton,
  SidebarMenuItem,
  SidebarProvider,
  SidebarTrigger,
} from '@/components/ui/sidebar'
import type {
  ApplicationLayoutProps,
  NavigationGroup,
  NavigationItem,
} from '@/runtime/contracts/layout'

function normalizeNavigation(
  navigation: ApplicationLayoutProps['application']['navigation'],
): NavigationGroup[] {
  if (!navigation) return []

  if (Array.isArray(navigation)) {
    return [{ label: null, items: navigation }]
  }

  if (Array.isArray(navigation.groups)) {
    return navigation.groups
  }

  if (Array.isArray(navigation.items)) {
    return [{ label: null, items: navigation.items }]
  }

  return []
}

function targetOf(item: NavigationItem): string | null {
  if (item.route) return item.route
  if (item.url) return item.url
  return null
}

function normalizePath(value: string): string {
  try {
    const parsed = new URL(value, window.location.origin)
    return parsed.pathname.replace(/\/+$/, '') || '/'
  } catch {
    const path = String(value || '').split(/[?#]/, 1)[0]
    return `/${path.replace(/^\/+/, '').replace(/\/+$/, '')}`.replace(/^\/$/, '/')
  }
}

function isActive(item: NavigationItem, currentPath: string): boolean {
  const target = targetOf(item)
  if (!target) return false

  const current = normalizePath(currentPath)
  const destination = normalizePath(target)

  if (destination === current) return true

  if (item.children?.length) {
    return item.children.some((child) => isActive(child, current))
  }

  return false
}

function NavigationItemView({
  item,
  currentPath,
  onNavigate,
}: {
  item: NavigationItem
  currentPath: string
  onNavigate?: (target: string) => void
}) {
  if (item.visible === false) return null

  const target = targetOf(item)
  const active = isActive(item, currentPath)

  const handleClick = (event: React.MouseEvent<HTMLButtonElement>) => {
    if (!target || !onNavigate) return
    event.preventDefault()
    onNavigate(target)
  }

  return (
    <SidebarMenuItem>
      <SidebarMenuButton
        isActive={active}
        tooltip={item.label}
        onClick={handleClick}
        render={target && !onNavigate ? <a href={target} /> : undefined}
      >
        <span className="size-4 shrink-0 rounded-sm border border-current/20" aria-hidden="true" />
        <span>{item.label}</span>
        {item.badge !== null && item.badge !== undefined ? (
          <span className="ml-auto text-xs text-muted-foreground">{item.badge}</span>
        ) : null}
      </SidebarMenuButton>

      {item.children?.length ? (
        <div className="ml-4 border-l pl-2">
          <SidebarMenu>
            {item.children.map((child) => (
              <NavigationItemView
                key={`${child.route ?? child.url ?? child.label}`}
                item={child}
                currentPath={currentPath}
                onNavigate={onNavigate}
              />
            ))}
          </SidebarMenu>
        </div>
      ) : null}
    </SidebarMenuItem>
  )
}

export function SidebarLayout({
  application,
  currentPath,
  children,
  onNavigate,
}: ApplicationLayoutProps) {
  const groups = normalizeNavigation(application.navigation)
  const title = application.title ?? application.name ?? 'Application'
  const path = application.path ?? ''

  return (
    <SidebarProvider>
      <Sidebar variant="sidebar" collapsible="icon">
        <SidebarHeader className="border-b">
          <div className="flex min-w-0 items-center gap-3 px-2 py-1.5">
            <div className="flex size-8 shrink-0 items-center justify-center rounded-lg bg-foreground text-sm font-semibold text-background">
              {application.logo ? (
                <img src={application.logo} alt="" className="size-8 rounded-lg object-cover" />
              ) : (
                title.slice(0, 1).toUpperCase()
              )}
            </div>
            <div className="min-w-0 group-data-[collapsible=icon]:hidden">
              <div className="truncate text-sm font-semibold">{title}</div>
              {path ? <div className="truncate text-xs text-muted-foreground">{path}</div> : null}
            </div>
          </div>
        </SidebarHeader>

        <SidebarContent>
          {groups.map((group, index) => (
            <SidebarGroup key={`${group.label ?? 'group'}-${index}`}>
              {group.label ? <SidebarGroupLabel>{group.label}</SidebarGroupLabel> : null}
              <SidebarGroupContent>
                <SidebarMenu>
                  {group.items.map((item) => (
                    <NavigationItemView
                      key={`${item.route ?? item.url ?? item.label}`}
                      item={item}
                      currentPath={currentPath}
                      onNavigate={onNavigate}
                    />
                  ))}
                </SidebarMenu>
              </SidebarGroupContent>
            </SidebarGroup>
          ))}
        </SidebarContent>

        <SidebarFooter className="border-t">
          <div className="flex items-center gap-2 px-2 py-2 text-xs text-muted-foreground">
            <span className="size-2 rounded-full bg-emerald-500" aria-hidden="true" />
            <span className="truncate group-data-[collapsible=icon]:hidden">QuickCMS Runtime</span>
          </div>
        </SidebarFooter>
      </Sidebar>

      <SidebarInset>
        <header className="sticky top-0 z-10 flex h-12 shrink-0 items-center gap-2 border-b bg-background/95 px-4 backdrop-blur">
          <SidebarTrigger>
            <PanelLeft />
          </SidebarTrigger>
          <div className="h-5 w-px bg-border" />
          <div className="flex min-w-0 items-center gap-2 text-sm">
            <span className="truncate text-muted-foreground">{title}</span>
            <ChevronRight className="size-4 shrink-0 text-muted-foreground" />
            <span className="truncate font-medium">{currentPath}</span>
          </div>
        </header>
        <main className="min-h-[calc(100vh-3rem)] flex-1">{children}</main>
      </SidebarInset>
    </SidebarProvider>
  )
}
