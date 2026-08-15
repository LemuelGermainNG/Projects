import type { ResolvedIcon, IconProvider } from '../types'
import { toPascalCase } from '../types'
import * as LucideIcons from 'lucide-react'

type IconModule = Record<
  string,
  unknown
>

const icons =
  LucideIcons as unknown as IconModule

function iconName(value: string): string {
  return toPascalCase(
    value.replace(/^lucide[-_:]/i, ''),
  )
}

export const LucideProvider: IconProvider = {
  supports(value) {
    return /^lucide[-_:]/i.test(value)
  },

  resolve(value) {
    const name = iconName(value)
    const icon = icons[name]

    return typeof icon === 'object' ||
      typeof icon === 'function'
      ? (icon as ResolvedIcon)
      : null
  },
}
