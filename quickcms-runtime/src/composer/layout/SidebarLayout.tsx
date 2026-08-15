import type { MouseEvent } from 'react'
import { User } from 'lucide-react'

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
  SidebarRail,
  SidebarTrigger,
} from '@/components/ui/sidebar'
import { Separator } from '@/components/ui/separator'
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbPage,
  BreadcrumbSeparator,
} from '@/components/ui/breadcrumb'

import type {
  ApplicationSchema,
  NavigationGroup,
  NavigationItem,
} from '@/core/application/types'
import { normalizeNavigation, isNavigationGroup } from '@/core/navigation/normalizeNavigation'
import { resolveIcon } from '@/runtime/icons/IconResolver'
import type { ApplicationLayoutProps } from './LayoutRegistry'

export function SidebarLayout({
  application,
  schema,
  route,
  routeResolver,
  page,
  children,
}: ApplicationLayoutProps) {
  const navigation = normalizeNavigation(schema.navigation)
  const currentPath = route.path
  const currentPageTitle = page?.header?.title ?? findNavigationLabel(schema, route.route) ?? route.route

  return (
    <SidebarProvider>
      <Sidebar collapsible="icon">
        <SidebarHeader>
          <ApplicationHeader application={application} />
        </SidebarHeader>

        <SidebarContent>
          {navigation.map((entry, index) =>
            isNavigationGroup(entry) ? (
              <NavigationGroup
                key={entry.id ?? `${entry.label}-${index}`}
                group={entry}
                routeResolver={routeResolver}
                currentPath={currentPath}
              />
            ) : (
              <NavigationItem
                key={`${entry.route ?? entry.url ?? entry.label}`}
                item={entry}
                routeResolver={routeResolver}
                currentPath={currentPath}
              />
            ),
          )}
        </SidebarContent>

        <SidebarFooter>
          <ApplicationFooter application={application} />
        </SidebarFooter>

        <SidebarRail />
      </Sidebar>

      <SidebarInset>
        <header className="flex h-16 shrink-0 items-center gap-2 border-b">
          <div className="flex min-w-0 items-center gap-2 px-4">
            <SidebarTrigger className="-ml-1" />
            <Separator
              orientation="vertical"
              className="mr-2 data-[orientation=vertical]:h-4"
            />

            <Breadcrumb>
              <BreadcrumbList>
                <BreadcrumbItem className="hidden md:block">
                  <BreadcrumbLink href={application.path}>
                    {application.name}
                  </BreadcrumbLink>
                </BreadcrumbItem>

                <BreadcrumbSeparator className="hidden md:block" />

                <BreadcrumbItem>
                  <BreadcrumbPage>{currentPageTitle}</BreadcrumbPage>
                </BreadcrumbItem>
              </BreadcrumbList>
            </Breadcrumb>
          </div>
        </header>

        <main className="flex min-h-0 flex-1 flex-col">
          {children}
        </main>
      </SidebarInset>
    </SidebarProvider>
  )
}

function NavigationGroup({
  group,
  routeResolver,
  currentPath,
}: {
  group: NavigationGroup
  routeResolver: ApplicationLayoutProps['routeResolver']
  currentPath: string
}) {
  return (
    <SidebarGroup>
      <SidebarGroupLabel>{group.label}</SidebarGroupLabel>
      <SidebarGroupContent>
        <SidebarMenu>
          {group.items.map((item) => (
            <NavigationItem
              key={item.route ?? item.url ?? item.label}
              item={item}
              routeResolver={routeResolver}
              currentPath={currentPath}
            />
          ))}
        </SidebarMenu>
      </SidebarGroupContent>
    </SidebarGroup>
  )
}

function NavigationItem({
  item,
  routeResolver,
  currentPath,
}: {
  item: NavigationItem
  routeResolver: ApplicationLayoutProps['routeResolver']
  currentPath: string
}) {
  if (item.visible === false) return null

  const Icon = resolveIcon(item.icon)
  const href = routeResolver.resolveHref(item.route ?? null, item.url ?? null)
  const isActive = item.route
    ? routeResolver.isActive(item.route, currentPath)
    : routeResolver.isUrlActive(item.url ?? null, currentPath)

  const handleClick = (event: MouseEvent<HTMLAnchorElement>) => {
    if (event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return

    const target = item.url ?? item.route
    if (!target) return

    if (item.url && /^https?:\/\//i.test(item.url)) return

    event.preventDefault()
    routeResolver.navigate(item.route ?? null, item.url ?? null)
  }

  return (
    <SidebarMenuItem>
      <SidebarMenuButton
        asChild
        isActive={isActive}
        tooltip={item.label}
      >
        <a
          href={href}
          onClick={handleClick}
          className="flex w-full items-center gap-2"
        >
          <Icon className="size-4 shrink-0" />
          <span className="truncate">{item.label}</span>
          {item.badge !== null && item.badge !== undefined ? (
            <span className="ml-auto text-xs text-muted-foreground">
              {String(item.badge)}
            </span>
          ) : null}
        </a>
      </SidebarMenuButton>
    </SidebarMenuItem>
  )
}

function ApplicationHeader({
  application,
}: {
  application: ApplicationLayoutProps['application']
}) {
  const initial = application.name.charAt(0).toUpperCase() || 'Q'

  return (
    <SidebarMenu>
      <SidebarMenuItem>
        <SidebarMenuButton size="lg" tooltip={application.name}>
          <div className="flex aspect-square size-8 shrink-0 items-center justify-center rounded-lg bg-sidebar-primary text-sidebar-primary-foreground">
            <span className="text-sm font-semibold">{initial}</span>
          </div>
          <div className="grid min-w-0 flex-1 text-left text-sm leading-tight">
            <span className="truncate font-semibold">{application.name}</span>
            <span className="truncate text-xs">{application.path}</span>
          </div>
        </SidebarMenuButton>
      </SidebarMenuItem>
    </SidebarMenu>
  )
}

function ApplicationFooter({
  application,
}: {
  application: ApplicationLayoutProps['application']
}) {
  return (
    <SidebarMenu>
      <SidebarMenuItem>
        <SidebarMenuButton size="lg" tooltip="QuickCMS Runtime">
          <div className="flex aspect-square size-8 shrink-0 items-center justify-center rounded-lg bg-muted">
            <User className="size-4" />
          </div>
          <div className="grid min-w-0 flex-1 text-left text-sm leading-tight">
            <span className="truncate font-semibold">{application.name}</span>
            <span className="truncate text-xs text-muted-foreground">
              QuickCMS Runtime
            </span>
          </div>
        </SidebarMenuButton>
      </SidebarMenuItem>
    </SidebarMenu>
  )
}

function findNavigationLabel(
  schema: ApplicationSchema,
  route: string,
): string | null {
  const entries = normalizeNavigation(schema.navigation)

  for (const entry of entries) {
    if (isNavigationGroup(entry)) {
      for (const item of entry.items) {
        if (item.route && routeResolverEquivalent(item.route, route)) {
          return item.label
        }
      }
      continue
    }

    if (entry.route && routeResolverEquivalent(entry.route, route)) {
      return entry.label
    }
  }

  return null
}

function routeResolverEquivalent(left: string, right: string): boolean {
  return left.replace(/\.index$/, '') === right.replace(/\.index$/, '')
}
