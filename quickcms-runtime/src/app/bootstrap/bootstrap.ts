import { QueryClient } from '@tanstack/react-query'
import { getRuntimeConfig } from '@/app/config/runtime-config'
import { ApiClient } from '@/core/api/ApiClient'
import { ApplicationApi } from '@/core/application/ApplicationApi'
import type { RuntimeServices } from '@/app/providers/AppProvider'

export function bootstrap(): { queryClient: QueryClient; runtime: RuntimeServices } {
  const config = getRuntimeConfig()
  const client = new ApiClient({ baseUrl: config.apiUrl })
  const applicationApi = new ApplicationApi(client, config.application)

  return {
    queryClient: new QueryClient({
      defaultOptions: {
        queries: { retry: 1, refetchOnWindowFocus: false },
      },
    }),
    runtime: { config, client, applicationApi },
  }
}
