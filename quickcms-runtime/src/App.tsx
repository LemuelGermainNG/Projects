import type { RuntimeServices } from '@/app/providers/AppProvider'
import { ApplicationRuntime } from '@/runtime/application/ApplicationRuntime'

export default function App({ runtime }: { runtime: RuntimeServices }) {
  return <ApplicationRuntime runtime={runtime} />
}
