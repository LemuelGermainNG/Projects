import { useQuery } from '@tanstack/react-query'

import type { ApplicationDocument } from '@/runtime/Contracts/Application'
import type { ApplicationApi } from '@/runtime/API/ApplicationApi'

export function applicationSchemaQueryKey(
  application: string,
) {
  return [
    'application-schema',
    application,
  ] as const
}

export function useApplicationSchema(
  api: ApplicationApi,
  application: string,
) {
  return useQuery<ApplicationDocument>({
    queryKey:
      applicationSchemaQueryKey(application),

    queryFn: ({ signal }) =>
      api
        .getSchema(application, signal)
        .then(
          (response) => response.data,
        ),
  })
}