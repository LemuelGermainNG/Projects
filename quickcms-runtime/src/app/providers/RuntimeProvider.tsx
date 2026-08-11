import {
  createContext,
  useContext,
  type ReactNode,
} from 'react'
import type { Runtime } from '@/runtime/Runtime'

const RuntimeContext = createContext<Runtime | null>(null)

interface RuntimeProviderProps {
  runtime: Runtime
  children: ReactNode
}

export function RuntimeProvider({
  runtime,
  children,
}: RuntimeProviderProps) {
  return (
    <RuntimeContext.Provider value={runtime}>
      {children}
    </RuntimeContext.Provider>
  )
}

export function useRuntime() {
  const runtime = useContext(RuntimeContext)

  if (!runtime) {
    throw new Error('useRuntime must be used inside RuntimeProvider.')
  }

  return runtime
}
