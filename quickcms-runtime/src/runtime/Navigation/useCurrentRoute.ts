import {
  useEffect,
  useState,
} from 'react'

import type {
  ResolvedRoute,
  RouteResolver,
} from './RouteResolver'

export function useCurrentRoute(
  routeResolver: RouteResolver,
): ResolvedRoute {
  const [
    currentRoute,
    setCurrentRoute,
  ] = useState<ResolvedRoute>(
    () =>
      routeResolver.resolveCurrentRoute(),
  )

  useEffect(() => {
    const handleRouteChange =
      () => {
        setCurrentRoute(
          routeResolver.resolveCurrentRoute(),
        )
      }

    window.addEventListener(
      'popstate',
      handleRouteChange,
    )

    return () => {
      window.removeEventListener(
        'popstate',
        handleRouteChange,
      )
    }
  }, [routeResolver])

  return currentRoute
}