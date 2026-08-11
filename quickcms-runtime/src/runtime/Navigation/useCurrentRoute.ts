import {
  useEffect,
  useState,
} from 'react'

import type {
  RouteResolver,
} from './RouteResolver'

export function useCurrentRoute(
  routeResolver: RouteResolver,
): string {
  const [
    currentPath,
    setCurrentPath,
  ] = useState<string>(
    () =>
      routeResolver.getCurrentPath(),
  )

  useEffect(() => {
    const handleRouteChange =
      () => {
        setCurrentPath(
          routeResolver.getCurrentPath(),
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

  return currentPath
}