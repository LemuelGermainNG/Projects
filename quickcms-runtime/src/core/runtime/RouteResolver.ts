export interface RouteResolverOptions {
  applicationPath: string
}

export class RouteResolver {
  private readonly applicationPath: string

  constructor(options: RouteResolverOptions) {
    this.applicationPath = this.normalizePath(options.applicationPath)
  }

  toPath(route: string): string {
    const normalizedRoute = this.normalizeRoute(route)
    return normalizedRoute ? `${this.applicationPath}/${normalizedRoute}` : this.applicationPath
  }

  fromPath(pathname: string): string | null {
    const path = this.normalizePath(pathname)
    if (path === this.applicationPath) return null
    if (!path.startsWith(`${this.applicationPath}/`)) return null
    return path.slice(this.applicationPath.length + 1) || null
  }

  currentRoute(root: string | null): string | null {
    return this.fromPath(window.location.pathname) ?? root
  }

  navigate(route: string): void {
    const target = this.toPath(route)
    if (window.location.pathname !== target) {
      window.history.pushState({ quickcmsRoute: route }, '', target)
    }
    window.dispatchEvent(new PopStateEvent('popstate'))
  }

  isActive(route: string, currentRoute: string | null): boolean {
    return this.normalizeRoute(route) === this.normalizeRoute(currentRoute ?? '')
  }

  private normalizeRoute(route: string): string {
    return route.replace(/^\/+|\/+$/g, '')
  }

  private normalizePath(path: string): string {
    const normalized = path.trim().replace(/\/+$/, '')
    return normalized === '' ? '/' : normalized.startsWith('/') ? normalized : `/${normalized}`
  }
}
