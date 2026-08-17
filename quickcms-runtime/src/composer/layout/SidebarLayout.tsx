import { useEffect, useState, type MouseEvent } from 'react'
import {
  Collapsible,
  CollapsibleContent,
  CollapsibleTrigger,
} from "@/components/ui/collapsible"
import { ChevronRight, User } from 'lucide-react'

import {
  Sidebar,
  SidebarContent,
  SidebarFooter,
  SidebarGroup,
  SidebarGroupContent,
  SidebarHeader,
  SidebarInset,
  SidebarMenu,
  SidebarMenuButton,
  SidebarMenuItem,
  SidebarMenuSub,
  SidebarMenuSubButton,
  SidebarMenuSubItem,
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
import {
  isNavigationGroup,
  normalizeNavigation,
} from '@/core/navigation/normalizeNavigation'
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
  const currentPageTitle =
    page?.header?.title ??
    findNavigationLabel(schema, route.route) ??
    route.route

  return (
    <SidebarProvider style={
    {
      "--sidebar-width": "13rem",
      "--sidebar-width-mobile": "13rem",
    } as React.CSSProperties
  }>
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
              <SidebarGroup
                key={`${entry.route ?? entry.url ?? entry.label}`}
                className="pt-0"
              >
                <SidebarGroupContent>
                  <SidebarMenu>
                    <NavigationItem
                      item={entry}
                      routeResolver={routeResolver}
                      currentPath={currentPath}
                    />
                  </SidebarMenu>
                </SidebarGroupContent>
              </SidebarGroup>
            ),
          )}
        </SidebarContent>

        <SidebarFooter>
          <ApplicationFooter application={application} />
        </SidebarFooter>

        <SidebarRail />
      </Sidebar>

      <SidebarInset>
        <header className="flex h-16 shrink-0 items-center gap-2 border-b transition-[width,height] ease-linear">
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
  const hasActiveItem = group.items.some((item) => {
    if (item.visible === false) {
      return false
    }

    return item.url !== null
      ? routeResolver.isUrlActive(item.url, currentPath)
      : item.route !== null
        ? routeResolver.isActive(item.route, currentPath)
        : false
  })

  const [open, setOpen] = useState(hasActiveItem)

  const Icon = resolveIcon(group.icon)

  useEffect(() => {
    if (hasActiveItem) {
      setOpen(true)
    }
  }, [hasActiveItem])

  const visibleItems = group.items.filter(
    (item) => item.visible !== false,
  )

  if (visibleItems.length === 0) {
    return null
  }

  return (
    <SidebarGroup>
      <SidebarMenu>
        <Collapsible
          open={open}
          onOpenChange={setOpen}
          className="group/collapsible"
        >
          <SidebarMenuItem>
            <CollapsibleTrigger
              render={
                <SidebarMenuButton
                  tooltip={group.label}
                />
              }
            >
              <Icon className="size-4 shrink-0" />
              <span className="truncate">{group.label}</span>
              <ChevronRight className="ml-auto transition-transform duration-200 group-data-[state=open]/collapsible:rotate-90" />
            </CollapsibleTrigger>


            <CollapsibleContent className="overflow-hidden transition-[height] duration-200 data-ending-style:h-0">
              <SidebarMenuSub>
                {visibleItems.map((item) => (
                  <NavigationSubItem
                    key={item.route ?? item.url ?? item.label}
                    item={item}
                    routeResolver={routeResolver}
                    currentPath={currentPath}
                  />
                ))}
              </SidebarMenuSub>
            </CollapsibleContent>
          </SidebarMenuItem>
        </Collapsible>
      </SidebarMenu>
    </SidebarGroup>
  )
}

function NavigationSubItem({
  item,
  routeResolver,
  currentPath,
}: {
  item: NavigationItem
  routeResolver: ApplicationLayoutProps['routeResolver']
  currentPath: string
}) {
  const Icon = resolveIcon(item.icon)
  const href = routeResolver.resolveHref(
    item.route ?? null,
    item.url ?? null,
  )

  const isActive =
    item.url !== null
      ? routeResolver.isUrlActive(item.url, currentPath)
      : item.route !== null
        ? routeResolver.isActive(item.route, currentPath)
        : false

  const handleClick = (event: MouseEvent<HTMLAnchorElement>) => {
    if (
      event.metaKey ||
      event.ctrlKey ||
      event.shiftKey ||
      event.altKey
    ) {
      return
    }

    if (item.url && /^https?:\/\//i.test(item.url)) {
      return
    }

    if (!item.route && !item.url) {
      return
    }

    event.preventDefault()

    routeResolver.navigate(
      item.route ?? null,
      item.url ?? null,
    )
  }

  return (
    <SidebarMenuSubItem>
      <SidebarMenuSubButton
        isActive={isActive}
        render={
          <a
            href={href}
            onClick={handleClick}
          />
        }
      >
        <Icon className="size-4 shrink-0" />
        <span className="truncate">{item.label}</span>

        {item.badge !== null && item.badge !== undefined ? (
          <span className="ml-auto text-xs text-muted-foreground">
            {String(item.badge)}
          </span>
        ) : null}
      </SidebarMenuSubButton>
    </SidebarMenuSubItem>
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
  if (item.visible === false) {
    return null
  }

  const Icon = resolveIcon(item.icon)
  const href = routeResolver.resolveHref(
    item.route ?? null,
    item.url ?? null,
  )

  const isActive =
    item.url !== null
      ? routeResolver.isUrlActive(item.url, currentPath)
      : item.route !== null
        ? routeResolver.isActive(item.route, currentPath)
        : false

  const handleClick = (event: MouseEvent<HTMLAnchorElement>) => {
    if (
      event.metaKey ||
      event.ctrlKey ||
      event.shiftKey ||
      event.altKey
    ) {
      return
    }

    if (item.url && /^https?:\/\//i.test(item.url)) {
      return
    }

    if (!item.route && !item.url) {
      return
    }

    event.preventDefault()

    routeResolver.navigate(
      item.route ?? null,
      item.url ?? null,
    )
  }

  return (
    <SidebarMenuItem>
      <SidebarMenuButton
        isActive={isActive}
        tooltip={item.label}
        render={
          <a
            href={href}
            onClick={handleClick}
          />
        }
      >
        <Icon className="size-4 shrink-0" />
        <span className="truncate">{item.label}</span>

        {item.badge !== null && item.badge !== undefined ? (
          <span className="ml-auto text-xs text-muted-foreground">
            {String(item.badge)}
          </span>
        ) : null}
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
            <span className="truncate font-semibold">
              {application.name}
            </span>
            <span className="truncate text-xs">
              {application.path}
            </span>
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
            <span className="truncate font-semibold">
              {application.name}
            </span>
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

function routeResolverEquivalent(
  left: string,
  right: string,
): boolean {
  return left.replace(/\.index$/, '') === right.replace(/\.index$/, '')
}
