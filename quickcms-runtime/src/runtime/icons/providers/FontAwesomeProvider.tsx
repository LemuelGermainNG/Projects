import type { ComponentType, SVGProps } from 'react'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import * as SolidIcons from '@fortawesome/free-solid-svg-icons'
import * as RegularIcons from '@fortawesome/free-regular-svg-icons'
import * as BrandIcons from '@fortawesome/free-brands-svg-icons'
import type { IconProvider, ResolvedIcon } from '../types'
import { toPascalCase } from '../types'

type IconDefinitionLike = Parameters<
  typeof FontAwesomeIcon
>[0]['icon']

type IconModule = Record<
  string,
  unknown
>

const solid =
  SolidIcons as unknown as IconModule

const regular =
  RegularIcons as unknown as IconModule

const brands =
  BrandIcons as unknown as IconModule

function parse(value: string): {
  style: 'solid' | 'regular' | 'brands'
  name: string
} | null {
  const normalized =
    value.trim()

  const prefixed =
    normalized.match(
      /^(?:fontawesome|fa)[-_:](solid|regular|brands)[-_:](.+)$/i,
    )

  if (prefixed) {
    return {
      style:
        prefixed[1].toLowerCase() as
          | 'solid'
          | 'regular'
          | 'brands',
      name: prefixed[2],
    }
  }

  const short =
    normalized.match(
      /^(fas|far|fab)[-_:](.+)$/i,
    )

  if (short) {
    return {
      style:
        short[1].toLowerCase() === 'far'
          ? 'regular'
          : short[1].toLowerCase() === 'fab'
            ? 'brands'
            : 'solid',
      name: short[2],
    }
  }

  const generic =
    normalized.match(
      /^fontawesome[-_:](.+)$/i,
    )

  if (generic) {
    return {
      style: 'solid',
      name: generic[1],
    }
  }

  const fa =
    normalized.match(
      /^fa[-_:](.+)$/i,
    )

  if (fa) {
    return {
      style: 'solid',
      name: fa[1],
    }
  }

  return null
}

function resolveDefinition(
  parsed: NonNullable<
    ReturnType<typeof parse>
  >,
): IconDefinitionLike | null {
  const key =
    `fa${toPascalCase(parsed.name)}`

  const module =
    parsed.style === 'regular'
      ? regular
      : parsed.style === 'brands'
        ? brands
        : solid

  const definition =
    module[key]

  return definition
    ? (definition as IconDefinitionLike)
    : null
}

export const FontAwesomeProvider: IconProvider = {
  supports(value) {
    return /^(?:fontawesome|fa|fas|far|fab)[-_:]/i.test(
      value,
    )
  },

  resolve(value) {
    const parsed = parse(value)

    if (!parsed) {
      return null
    }

    const definition =
      resolveDefinition(parsed)

    if (!definition) {
      return null
    }

    const ResolvedFontAwesomeIcon: ComponentType<
      SVGProps<SVGSVGElement>
    > = ({ ...props }) => (
      <FontAwesomeIcon
        icon={definition}
        {...props}
      />
    )

    return ResolvedFontAwesomeIcon as ResolvedIcon
  },
}
