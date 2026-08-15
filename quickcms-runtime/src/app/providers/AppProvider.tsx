import type { ReactNode } from 'react'
import { QueryClient, QueryClientProvider } from '@tanstack/react-query'
import type { RuntimeConfig } from '@/app/config/runtime-config'
import type { ApiClient } from '@/core/api/ApiClient'
import type { ApplicationApi } from '@/core/application/ApplicationApi'

export interface RuntimeServices {
  config: RuntimeConfig
  client: ApiClient
  applicationApi: ApplicationApi
}

interface AppProviderProps {
  children: ReactNode
  queryClient: QueryClient
}

export function AppProvider({ children, queryClient }: AppProviderProps) {
  return <QueryClientProvider client={queryClient}>{children}</QueryClientProvider>
}
