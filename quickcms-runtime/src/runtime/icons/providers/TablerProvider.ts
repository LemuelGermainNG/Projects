import type { ResolvedIcon, IconProvider } from '../types'
import { toPascalCase } from '../types'
import * as TablerIcons from '@tabler/icons-react'

type IconModule = Record<
  string,
  unknown
>

const icons =
  TablerIcons as unknown as IconModule

export const TablerProvider: IconProvider = {
  supports(value) {
    return /^tabler[-_:]/i.test(value)
  },

  resolve(value) {
    const name =
      toPascalCase(
        value.replace(
          /^tabler[-_:]/i,
          '',
        ),
      )

    const icon =
      icons[`Icon${name}`]

    return typeof icon === 'object' ||
      typeof icon === 'function'
      ? (icon as ResolvedIcon)
      : null
  },
}
