import { createQueryClient } from './create-query-client'
import { createRuntime } from './create-runtime'

export function bootstrap() {
  return {
    queryClient: createQueryClient(),
    runtime: createRuntime(),
  }
}
