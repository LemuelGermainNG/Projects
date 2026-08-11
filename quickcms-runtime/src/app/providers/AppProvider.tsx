import type { ReactNode } from 'react'
import type { QueryClient } from '@tanstack/react-query'
import type { Runtime } from '@/runtime/Runtime'
import { QueryProvider } from './QueryProvider'
import { RuntimeProvider } from './RuntimeProvider'

interface AppProviderProps {
  queryClient: QueryClient
  runtime: Runtime
  children: ReactNode
}

export function AppProvider({
  queryClient,
  runtime,
  children,
}: AppProviderProps) {
  return (
    <QueryProvider client={queryClient}>
      <RuntimeProvider runtime={runtime}>{children}</RuntimeProvider>
    </QueryProvider>
  )
}
