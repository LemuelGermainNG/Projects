export interface RouteResolverOptions {
  applicationId: string
  applicationPath: string
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
      this.normalizePath(
        options.applicationPath,
      )
  }

  /**
   * Resolve a logical application route
   * to a browser path.
   *
   * Examples:
   *
   * admin.dashboard -> /admin
   * admin.settings  -> /admin/settings
   * admin.plugins   -> /admin/plugins
   * admin.system    -> /admin/system
   * users.index     -> /admin/users
   */
  resolveRoute(
    route: string | null,
  ): string {
    if (!route) {
      return this.applicationPath
    }

    const parts = route
      .split('.')
      .filter(Boolean)

    if (parts.length === 0) {
      return this.applicationPath
    }

    const [
      namespace,
      ...segments
    ] = parts

    /*
     * Routes belonging to the current
     * application.
     *
     * admin.dashboard
     * admin.settings
     * admin.plugins
     */
    if (
      namespace ===
      this.applicationId
    ) {
      /*
       * The application dashboard is
       * represented by the application root.
       *
       * admin.dashboard -> /admin
       */
      if (
        segments.length === 1 &&
        segments[0] === 'dashboard'
      ) {
        return this.applicationPath
      }

      return this.joinPath(
        this.applicationPath,
        ...segments,
      )
    }

    /*
     * Routes belonging to another
     * navigation namespace.
     *
     * users.index -> /admin/users
     * users.show  -> /admin/users/show
     */
    const resource =
      namespace

    const resourceSegments =
      segments.filter(
        (segment) =>
          segment !== 'index',
      )

    return this.joinPath(
      this.applicationPath,
      resource,
      ...resourceSegments,
    )
  }

  /**
   * Resolve the final browser URL for
   * a navigation item.
   *
   * An explicit URL always has priority
   * over the logical route.
   */
  resolveHref(
    route: string | null,
    url: string | null = null,
  ): string {
    if (url) {
      return url
    }

    return this.resolveRoute(route)
  }

  /**
   * Return the current browser path.
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
   * Check whether a logical route is
   * currently active.
   */
  isActive(
    route: string | null,
    currentPath: string,
  ): boolean {
    if (!route) {
      return false
    }

    const routePath =
      this.resolveRoute(route)

    return (
      this.normalizePath(
        routePath,
      ) ===
      this.normalizePath(
        currentPath,
      )
    )
  }

  /**
   * Check whether an explicit URL
   * is currently active.
   */
  isUrlActive(
    url: string | null,
    currentPath: string,
  ): boolean {
    if (!url) {
      return false
    }

    return (
      this.normalizePath(url) ===
      this.normalizePath(currentPath)
    )
  }

  /**
   * Navigate without reloading the
   * application.
   */
  navigate(
    route: string | null,
    url: string | null = null,
  ): void {
    if (
      typeof window === 'undefined'
    ) {
      return
    }

    const href =
      this.resolveHref(
        route,
        url,
      )

    const currentPath =
      this.getCurrentPath()

    if (
      this.normalizePath(href) ===
      currentPath
    ) {
      return
    }

    window.history.pushState(
      {},
      '',
      href,
    )

    window.dispatchEvent(
      new PopStateEvent(
        'popstate',
      ),
    )
  }

  /**
   * Normalize a browser path.
   */
  private normalizePath(
    path: string,
  ): string {
    if (!path) {
      return '/'
    }

    /*
     * Remove query string and hash.
     */
    const pathname =
      path.split('?')[0]
        .split('#')[0]

    const normalized =
      pathname.replace(
        /\/+/g,
        '/',
      )

    if (
      normalized.length > 1 &&
      normalized.endsWith('/')
    ) {
      return normalized.slice(
        0,
        -1,
      )
    }

    return normalized || '/'
  }

  /**
   * Join path segments safely.
   */
  private joinPath(
    ...segments: string[]
  ): string {
    const path =
      segments
        .filter(Boolean)
        .join('/')

    return this.normalizePath(
      `/${path}`,
    )
  }
}