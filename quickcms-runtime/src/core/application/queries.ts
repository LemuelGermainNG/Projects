import { useQuery } from '@tanstack/react-query'
import type { ApplicationApi } from './ApplicationApi'

export function applicationSchemaQueryKey(application: string) {
  return ['quickcms', 'application', application, 'schema'] as const
}

export function applicationPageQueryKey(application: string, route: string) {
  return ['quickcms', 'application', application, 'page', route] as const
}

export function useApplicationSchema(api: ApplicationApi) {
  return useQuery({
    queryKey: applicationSchemaQueryKey(api.application),
    queryFn: () => api.getSchema(),
    staleTime: 5 * 60 * 1000,
  })
}

export function useApplicationPage(api: ApplicationApi, route: string | null) {
  return useQuery({
    queryKey: route
      ? applicationPageQueryKey(api.application, route)
      : ['quickcms', 'application', 'page', 'idle'],
    queryFn: () => api.getPage(route!),
    enabled: Boolean(route),
    staleTime: 60 * 1000,
  })
}
