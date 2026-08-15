import { QueryClient } from '@tanstack/react-query'
import { ApiClient } from '@/core/api/ApiClient'
import { getRuntimeConfig } from '@/app/config/runtime-config'

export interface RuntimeBootstrap {
  queryClient: QueryClient
  api: ApiClient
  config: ReturnType<typeof getRuntimeConfig>
}

export function bootstrap(): RuntimeBootstrap {
  const config = getRuntimeConfig()

  return {
    config,
    api: new ApiClient({ baseUrl: config.apiUrl }),
    queryClient: new QueryClient({
      defaultOptions: {
        queries: {
          staleTime: 30_000,
          retry: 1,
        },
      },
    }),
  }
}
