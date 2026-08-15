import type { ResolvedIcon, IconProvider } from '../types'
import { toPascalCase } from '../types'
import * as HeroiconsOutline from '@heroicons/react/24/outline'
import * as HeroiconsSolid from '@heroicons/react/24/solid'

type IconModule = Record<
  string,
  unknown
>

const outline =
  HeroiconsOutline as unknown as IconModule

const solid =
  HeroiconsSolid as unknown as IconModule

function stripProvider(value: string): {
  style: 'outline' | 'solid'
  name: string
} | null {
  const outlineMatch =
    value.match(
      /^heroicon(?:s)?[-_:](?:o|outline)[-_:](.+)$/i,
    )

  if (outlineMatch) {
    return {
      style: 'outline',
      name: outlineMatch[1],
    }
  }

  const solidMatch =
    value.match(
      /^heroicon(?:s)?[-_:](?:s|solid)[-_:](.+)$/i,
    )

  if (solidMatch) {
    return {
      style: 'solid',
      name: solidMatch[1],
    }
  }

  return null
}

export const HeroiconsProvider: IconProvider = {
  supports(value) {
    return /^heroicon(?:s)?[-_:](?:o|s|outline|solid)[-_:]/i.test(
      value,
    )
  },

  resolve(value) {
    const parsed = stripProvider(value)

    if (!parsed) {
      return null
    }

    const key =
      `${toPascalCase(parsed.name)}Icon`

    const icon =
      parsed.style === 'outline'
        ? outline[key]
        : solid[key]

    return typeof icon === 'object' ||
      typeof icon === 'function'
      ? (icon as ResolvedIcon)
      : null
  },
}
