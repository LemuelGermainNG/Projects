import type { ReactNode } from 'react'
import { QueryClientProvider } from '@tanstack/react-query'
import type { QueryClient } from '@tanstack/react-query'

interface QueryProviderProps {
  client: QueryClient
  children: ReactNode
}

export function QueryProvider({ client, children }: QueryProviderProps) {
  return (
    <QueryClientProvider client={client}>
      {children}
    </QueryClientProvider>
  )
}
