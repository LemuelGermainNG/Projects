import {
  useMemo,
  type MouseEvent,
} from 'react'

import {
  Circle,
  LayoutDashboard,
  Puzzle,
  Server,
  Settings,
  User,
  Users,
} from 'lucide-react'

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
  ApplicationMetadata,
  ApplicationSchema,
} from '@/runtime/Contracts/Application'

import {
  RouteResolver,
} from '@/runtime/Navigation/RouteResolver'

import {
  useCurrentRoute,
} from '@/runtime/Navigation/useCurrentRoute'

import type {
  ApplicationLayoutProps,
} from './LayoutRegistry'

interface NavigationItem {
  label: string
  icon: string | null
  route: string | null
  url: string | null
  badge: string | number | null
  visible: boolean
  children: NavigationItem[]
  props: unknown[]
}

interface NavigationGroup {
  type: 'navigation'
  label: string
  icon: string | null
  items: NavigationItem[]
  props: unknown[]
}

function resolveIcon(
  icon: string | null,
) {
  switch (icon) {
    case 'heroicon-o-home':
      return LayoutDashboard

    case 'heroicon-o-cog-6-tooth':
      return Settings

    case 'heroicon-o-puzzle-piece':
      return Puzzle

    case 'heroicon-o-server':
      return Server

    case 'heroicon-o-users':
      return Users

    case 'heroicon-o-user':
      return User

    default:
      return Circle
  }
}

function getNavigation(
  schema: ApplicationSchema,
): NavigationGroup[] {
  return schema.navigation.filter(
    (
      item,
    ): item is NavigationGroup =>
      typeof item === 'object' &&
      item !== null &&
      'type' in item &&
      item.type === 'navigation',
  )
}

function NavigationItem({
  item,
  routeResolver,
  currentPath,
}: {
  item: NavigationItem
  routeResolver: RouteResolver
  currentPath: string
}) {
  if (!item.visible) {
    return null
  }

  const Icon = resolveIcon(
    item.icon,
  )

  const href =
    routeResolver.resolveHref(
      item.route,
      item.url,
    )

  const isActive =
    item.url !== null
      ? routeResolver.isUrlActive(
          item.url,
          currentPath,
        )
      : routeResolver.isActive(
          item.route,
          currentPath,
        )

  const handleClick = (
    event: MouseEvent<HTMLAnchorElement>,
  ) => {
    /*
     * Let the browser handle modified clicks.
     *
     * Examples:
     * - Ctrl + click
     * - Cmd + click
     * - Shift + click
     * - Alt + click
     */
    if (
      event.metaKey ||
      event.ctrlKey ||
      event.shiftKey ||
      event.altKey
    ) {
      return
    }

    /*
     * External URLs are handled by
     * the browser normally.
     */
    if (
      item.url &&
      /^https?:\/\//i.test(
        item.url,
      )
    ) {
      return
    }

    event.preventDefault()

    routeResolver.navigate(
      item.route,
      item.url,
    )
  }

  return (
    <SidebarMenuItem>
      <SidebarMenuButton
        isActive={isActive}
        tooltip={item.label}
        className="flex w-full flex-row items-center gap-2"
      >
        <a
          href={href}
          onClick={handleClick}
          className="flex w-full flex-row items-center gap-2"
        >
          <Icon className="size-4 shrink-0" />

          <span className="truncate">
            {item.label}
          </span>

          {item.badge !== null ? (
            <span className="ml-auto text-xs text-muted-foreground">
              {item.badge}
            </span>
          ) : null}
        </a>
      </SidebarMenuButton>
    </SidebarMenuItem>
  )
}

function NavigationGroup({
  group,
  routeResolver,
  currentPath,
}: {
  group: NavigationGroup
  routeResolver: RouteResolver
  currentPath: string
}) {
  return (
    <SidebarGroup>
      <SidebarGroupLabel>
        {group.label}
      </SidebarGroupLabel>

      <SidebarGroupContent>
        <SidebarMenu>
          {group.items.map(
            (item) => (
              <NavigationItem
                key={
                  item.route ??
                  item.url ??
                  item.label
                }
                item={item}
                routeResolver={
                  routeResolver
                }
                currentPath={
                  currentPath
                }
              />
            ),
          )}
        </SidebarMenu>
      </SidebarGroupContent>
    </SidebarGroup>
  )
}

function ApplicationHeader({
  application,
}: {
  application: ApplicationMetadata
}) {
  const initial =
    application.name
      .charAt(0)
      .toUpperCase()

  return (
    <SidebarMenu>
      <SidebarMenuItem>
        <SidebarMenuButton
          size="lg"
          tooltip={application.name}
        >
          <div className="flex aspect-square size-8 shrink-0 items-center justify-center rounded-lg bg-sidebar-primary text-sidebar-primary-foreground">
            <span className="text-sm font-semibold">
              {initial}
            </span>
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
  application: ApplicationMetadata
}) {
  return (
    <SidebarMenu>
      <SidebarMenuItem>
        <SidebarMenuButton
          size="lg"
          tooltip="QuickCMS Runtime"
        >
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

function getCurrentPageTitle(
  schema: ApplicationSchema,
): string {
  return (
    schema.root?.header?.title ??
    'Application'
  )
}

export function SidebarLayout({
  application,
  schema,
  children,
}: ApplicationLayoutProps) {
  /*
   * Keep the resolver stable between renders.
   */
  const routeResolver =
    useMemo(
      () =>
        new RouteResolver({
          applicationId:
            application.id,
          applicationPath:
            application.path,
        }),
      [
        application.id,
        application.path,
      ],
    )

  const navigation =
    getNavigation(schema)

  const currentPath =
    useCurrentRoute(
      routeResolver,
    )

  const currentPageTitle =
    getCurrentPageTitle(schema)

  return (
    <SidebarProvider>
      <Sidebar collapsible="icon">
        <SidebarHeader>
          <ApplicationHeader
            application={application}
          />
        </SidebarHeader>

        <SidebarContent>
          {navigation.map(
            (group) => (
              <NavigationGroup
                key={group.label}
                group={group}
                routeResolver={
                  routeResolver
                }
                currentPath={
                  currentPath
                }
              />
            ),
          )}
        </SidebarContent>

        <SidebarFooter>
          <ApplicationFooter
            application={application}
          />
        </SidebarFooter>

        <SidebarRail />
      </Sidebar>

      <SidebarInset>
        <header className="flex h-16 shrink-0 items-center gap-2 border-b">
          <div className="flex items-center gap-2 px-4">
            <SidebarTrigger className="-ml-1" />

            <Separator
              orientation="vertical"
              className="mr-2 data-[orientation=vertical]:h-4"
            />

            <Breadcrumb>
              <BreadcrumbList>
                <BreadcrumbItem className="hidden md:block">
                  <BreadcrumbLink href="#">
                    {application.name}
                  </BreadcrumbLink>
                </BreadcrumbItem>

                <BreadcrumbSeparator className="hidden md:block" />

                <BreadcrumbItem>
                  <BreadcrumbPage>
                    {currentPageTitle}
                  </BreadcrumbPage>
                </BreadcrumbItem>
              </BreadcrumbList>
            </Breadcrumb>
          </div>
        </header>

        <main className="flex flex-1 flex-col gap-4 p-4 pt-0">
          {children}
        </main>
      </SidebarInset>
    </SidebarProvider>
  )
}