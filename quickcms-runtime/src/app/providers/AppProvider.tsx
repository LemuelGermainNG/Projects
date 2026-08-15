import type { ReactNode } from 'react'
import { QueryClient, QueryClientProvider } from '@tanstack/react-query'
import type { ApiClient } from '@/core/api/ApiClient'

interface AppProviderProps {
  children: ReactNode
  queryClient: QueryClient
  api: ApiClient
}

export function AppProvider({ children, queryClient }: AppProviderProps) {
  return <QueryClientProvider client={queryClient}>{children}</QueryClientProvider>
}
