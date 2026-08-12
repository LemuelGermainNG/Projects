export interface RouteResolverOptions {
  applicationId: string
  applicationPath: string
}

export interface ResolvedRoute {
  /**
   * Original logical route received
   * from the backend.
   *
   * Examples:
   *
   * admin.dashboard
   * admin.settings
   * users.index
   */
  route: string

  /**
   * Browser pathname.
   *
   * Examples:
   *
   * /admin
   * /admin/settings
   * /admin/users
   */
  path: string

  /**
   * Backend page name.
   *
   * Examples:
   *
   * dashboard
   * settings
   * users
   */
  page: string

  /**
   * Application identifier.
   */
  application: string
}

export class RouteResolver {
  private readonly applicationId: string

  private readonly applicationPath: string

  constructor(
    options: RouteResolverOptions,
  ) {
    this.applicationId =
      options.applicationId

    this.applicationPath =
      this.normalizeApplicationPath(
        options.applicationPath,
      )
  }

  /**
   * Resolve a logical backend route.
   *
   * Supported forms:
   *
   * dashboard
   * settings
   * admin.dashboard
   * admin.settings
   * users.index
   * users.show
   */
  resolve(
    route: string | null,
  ): ResolvedRoute {
    const normalizedRoute =
      this.normalizeRoute(route)

    if (!normalizedRoute) {
      return this.createResolvedRoute(
        'dashboard',
        'dashboard',
        this.applicationPath,
      )
    }

    const segments =
      normalizedRoute
        .split('.')
        .filter(Boolean)

    /*
     * Backend may prefix routes with
     * the application identifier.
     *
     * admin.settings
     *
     * becomes:
     *
     * settings
     */
    const applicationPrefix =
      `${this.applicationId}.`

    let routeSegments =
      segments

    if (
      normalizedRoute.startsWith(
        applicationPrefix,
      )
    ) {
      routeSegments =
        normalizedRoute
          .slice(
            applicationPrefix.length,
          )
          .split('.')
          .filter(Boolean)
    }

    if (
      routeSegments.length === 0
    ) {
      routeSegments = [
        'dashboard',
      ]
    }

    /*
     * First segment is the page/resource.
     *
     * settings
     * users
     */
    const page =
      routeSegments[0] ??
      'dashboard'

    /*
     * Dashboard is the application
     * root.
     *
     * admin.dashboard
     * dashboard
     *
     * both resolve to:
     *
     * /admin
     */
    if (
      routeSegments.length === 1 &&
      page === 'dashboard'
    ) {
      return this.createResolvedRoute(
        normalizedRoute,
        'dashboard',
        this.applicationPath,
      )
    }

    /*
     * Remove "index" from resource
     * routes.
     *
     * users.index
     *     ↓
     * /admin/users
     */
    const pathSegments =
      routeSegments.filter(
        (segment) =>
          segment !== 'index',
      )

    return this.createResolvedRoute(
      normalizedRoute,
      page,
      this.joinPath(
        this.applicationPath,
        ...pathSegments,
      ),
    )
  }

  /**
   * Resolve a navigation href.
   */
  resolveHref(
    route: string | null,
    url: string | null = null,
  ): string {
    if (url) {
      return this.normalizeHref(url)
    }

    return this.resolve(route).path
  }

  /**
   * Get current browser path.
   */
  getCurrentPath(): string {
    if (
      typeof window === 'undefined'
    ) {
      return this.applicationPath
    }

    return this.normalizePath(
      window.location.pathname,
    )
  }

  /**
   * Resolve the current browser URL
   * back into a logical application route.
   */
  resolveCurrentRoute(): ResolvedRoute {
    const currentPath =
      this.getCurrentPath()

    /*
     * /admin
     *
     * becomes dashboard.
     */
    if (
      currentPath ===
      this.applicationPath
    ) {
      return this.resolve(
        'dashboard',
      )
    }

    /*
     * If the path does not belong
     * to this application, fall back
     * to dashboard.
     */
    if (
      !this.isApplicationPath(
        currentPath,
      )
    ) {
      return this.resolve(
        'dashboard',
      )
    }

    /*
     * /admin/settings
     *
     * becomes:
     *
     * settings
     */
    const relativePath =
      currentPath.slice(
        this.applicationPath.length,
      )

    const route =
      relativePath
        .replace(
          /^\/+/,
          '',
        )
        .replace(
          /\/+$/,
          '',
        )

    return this.resolve(
      route || 'dashboard',
    )
  }

  /**
   * Check active logical route.
   */
  isActive(
    route: string | null,
    currentPath?: string,
  ): boolean {
    if (!route) {
      return false
    }

    const resolved =
      this.resolve(route)

    const path =
      currentPath ??
      this.getCurrentPath()

    return (
      this.normalizePath(
        resolved.path,
      ) ===
      this.normalizePath(
        path,
      )
    )
  }

  /**
   * Check active explicit URL.
   */
  isUrlActive(
    url: string | null,
    currentPath?: string,
  ): boolean {
    if (!url) {
      return false
    }

    const path =
      currentPath ??
      this.getCurrentPath()

    return (
      this.normalizePath(
        this.normalizeHref(url),
      ) ===
      this.normalizePath(
        path,
      )
    )
  }

  /**
   * Navigate to a route without
   * reloading the application.
   */
  navigate(
    route: string | null,
    url: string | null = null,
  ): ResolvedRoute | null {
    if (
      typeof window === 'undefined'
    ) {
      return null
    }

    const resolved =
      route
        ? this.resolve(route)
        : null

    const href =
      this.normalizeHref(
        url ??
          resolved?.path ??
          this.applicationPath,
      )

    /*
     * External URL.
     *
     * We never pass an external URL
     * to pushState().
     */
    if (
      this.isExternalUrl(href)
    ) {
      window.location.href =
        href

      return resolved
    }

    const currentPath =
      this.getCurrentPath()

    if (
      href === currentPath
    ) {
      return resolved
    }

    window.history.pushState(
      {},
      '',
      href,
    )

    /*
     * Notify the Runtime.
     */
    window.dispatchEvent(
      new PopStateEvent(
        'popstate',
      ),
    )

    return resolved
  }

  private createResolvedRoute(
    route: string,
    page: string,
    path: string,
  ): ResolvedRoute {
    return {
      route,
      page,
      path,
      application:
        this.applicationId,
    }
  }

  private normalizeApplicationPath(
    path: string,
  ): string {
    if (!path) {
      return '/'
    }

    if (
      /^https?:\/\//i.test(path)
    ) {
      try {
        return this.normalizePath(
          new URL(path).pathname,
        )
      } catch {
        return '/'
      }
    }

    return this.normalizePath(
      path,
    )
  }

  private normalizeRoute(
    route: string | null,
  ): string {
    if (!route) {
      return ''
    }

    return route
      .trim()
      .replace(
        /^\/+/,
        '',
      )
      .replace(
        /\/+$/,
        '',
      )
  }

  private normalizeHref(
    href: string,
  ): string {
    if (!href) {
      return this.applicationPath
    }

    if (
      /^https?:\/\//i.test(href)
    ) {
      try {
        const url =
          new URL(href)

        if (
          typeof window !==
            'undefined' &&
          url.origin ===
            window.location.origin
        ) {
          return this.normalizePath(
            url.pathname,
          )
        }

        return href
      } catch {
        return this.applicationPath
      }
    }

    return this.normalizePath(
      href,
    )
  }

  private normalizePath(
    path: string,
  ): string {
    if (!path) {
      return '/'
    }

    let value = path

    if (
      /^https?:\/\//i.test(value)
    ) {
      try {
        value =
          new URL(value).pathname
      } catch {
        value = '/'
      }
    }

    value =
      value
        .split('?')[0]
        .split('#')[0]
        .replace(
          /\/+/g,
          '/',
        )

    if (
      !value.startsWith('/')
    ) {
      value = `/${value}`
    }

    if (
      value.length > 1 &&
      value.endsWith('/')
    ) {
      value =
        value.slice(
          0,
          -1,
        )
    }

    return value || '/'
  }

  private joinPath(
    ...segments: string[]
  ): string {
    const value =
      segments
        .filter(Boolean)
        .map(
          (segment) =>
            segment
              .replace(
                /^\/+/,
                '',
              )
              .replace(
                /\/+$/,
                '',
              ),
        )
        .filter(Boolean)
        .join('/')

    return this.normalizePath(
      value,
    )
  }

  private isApplicationPath(
    path: string,
  ): boolean {
    if (
      this.applicationPath === '/'
    ) {
      return true
    }

    return (
      path ===
        this.applicationPath ||
      path.startsWith(
        `${this.applicationPath}/`,
      )
    )
  }

  private isExternalUrl(
    url: string,
  ): boolean {
    return /^https?:\/\//i.test(
      url,
    )
  }
}