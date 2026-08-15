export interface RouteResolverOptions {
  applicationPath: string
  rootRoute?: string
}

export interface ResolvedRoute {
  route: string
  path: string
  page: string
}

export class RouteResolver {
  private readonly applicationPath: string
  private readonly rootRoute: string

  constructor(options: RouteResolverOptions) {
    this.applicationPath = this.normalizePath(options.applicationPath)
    this.rootRoute = this.normalizeRoute(options.rootRoute ?? 'dashboard')
  }

  resolve(route: string | null): ResolvedRoute {
    const normalizedRoute = this.normalizeRoute(route ?? '') || this.rootRoute
    const segments = normalizedRoute.split('.').filter(Boolean)
    const page = segments[0] ?? this.rootRoute

    if (normalizedRoute === this.rootRoute) {
      return { route: normalizedRoute, path: this.applicationPath, page }
    }

    const pathSegments = segments.filter((segment) => segment !== 'index')

    return {
      route: normalizedRoute,
      path: this.joinPath(this.applicationPath, ...pathSegments),
      page,
    }
  }

  resolveHref(route: string | null, url: string | null = null): string {
    if (url) return url
    return this.resolve(route).path
  }

  resolveCurrentRoute(rootRoute: string | null = this.rootRoute): ResolvedRoute {
    const currentPath = this.getCurrentPath()

    if (currentPath === this.applicationPath) {
      return this.resolve(rootRoute || this.rootRoute)
    }

    if (!this.isApplicationPath(currentPath)) {
      return this.resolve(rootRoute || this.rootRoute)
    }

    const relativePath = currentPath.slice(this.applicationPath.length).replace(/^\/+/, '')
    const route = relativePath
      ? relativePath.split('/').filter(Boolean).join('.')
      : rootRoute || this.rootRoute

    return this.resolve(route)
  }

  getCurrentPath(): string {
    if (typeof window === 'undefined') return this.applicationPath
    return this.normalizePath(window.location.pathname)
  }

  isActive(route: string | null, currentPath?: string): boolean {
    if (!route) return false
    const target = this.resolve(route).path
    const current = this.normalizePath(currentPath ?? this.getCurrentPath())
    return target === current
  }

  isUrlActive(url: string | null, currentPath?: string): boolean {
    if (!url) return false

    const target = this.normalizeHref(url)
    const current = this.normalizePath(currentPath ?? this.getCurrentPath())

    return target === current
  }

  navigate(route: string | null, url: string | null = null): ResolvedRoute | null {
    if (typeof window === 'undefined') return null

    const resolved = route ? this.resolve(route) : null
    const href = this.normalizeNavigationTarget(url ?? resolved?.path ?? this.applicationPath)

    if (this.isExternalUrl(href)) {
      window.location.assign(href)
      return resolved
    }

    if (href === this.getCurrentPath()) {
      window.dispatchEvent(new PopStateEvent('popstate'))
      return resolved
    }

    window.history.pushState({ quickcmsRoute: route }, '', href)
    window.dispatchEvent(new PopStateEvent('popstate'))

    return resolved
  }

  private isApplicationPath(path: string): boolean {
    return path === this.applicationPath || path.startsWith(`${this.applicationPath}/`)
  }

  private normalizeNavigationTarget(value: string): string {
    if (this.isExternalUrl(value)) return value

    try {
      const parsed = new URL(value, window.location.origin)
      if (parsed.origin !== window.location.origin) return parsed.toString()
      return this.normalizePath(parsed.pathname)
    } catch {
      return this.normalizePath(value)
    }
  }

  private normalizeHref(value: string): string {
    if (this.isExternalUrl(value)) return value

    try {
      const parsed = new URL(value, window.location.origin)
      if (parsed.origin !== window.location.origin) return parsed.toString()
      return this.normalizePath(parsed.pathname)
    } catch {
      return this.normalizePath(value)
    }
  }

  private isExternalUrl(value: string): boolean {
    try {
      const parsed = new URL(value, window.location.origin)
      return parsed.origin !== window.location.origin
    } catch {
      return false
    }
  }

  private normalizeRoute(route: string): string {
    return route.trim().replace(/^\/+|\/+$/g, '')
  }

  private normalizePath(path: string): string {
    const pathname = path.split('?')[0].split('#')[0]
    const normalized = pathname.replace(/\/{2,}/g, '/')
    const withoutTrailingSlash = normalized.length > 1 ? normalized.replace(/\/+$/, '') : normalized
    return withoutTrailingSlash === '' ? '/' : withoutTrailingSlash.startsWith('/') ? withoutTrailingSlash : `/${withoutTrailingSlash}`
  }

  private joinPath(...segments: string[]): string {
    return this.normalizePath(segments.filter(Boolean).join('/'))
  }
}
