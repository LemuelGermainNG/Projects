import { useEffect, useState } from 'react'

import type { ResolvedRoute, RouteResolver } from './RouteResolver'

export function useCurrentRoute(routeResolver: RouteResolver): ResolvedRoute {
  const [route, setRoute] = useState<ResolvedRoute>(() =>
    routeResolver.resolveCurrentRoute(),
  )

  useEffect(() => {
    const sync = () => setRoute(routeResolver.resolveCurrentRoute())

    sync()
    window.addEventListener('popstate', sync)

    return () => {
      window.removeEventListener('popstate', sync)
    }
  }, [routeResolver])

  return route
}
