import {
  LayoutDashboard,
  Puzzle,
  Server,
  Settings,
  User,
  Users,
  Circle,
} from 'lucide-react'

import type {
  IconComponent,
  IconProvider,
} from '../IconProvider'

const icons: Record<
  string,
  IconComponent
> = {
  'home': LayoutDashboard,
  'cog-6-tooth': Settings,
  'puzzle-piece': Puzzle,
  server: Server,
  users: Users,
  user: User,
  circle: Circle,
}

export class HeroiconsIconProvider
  implements IconProvider
{
  readonly name = 'heroicon'

  supports(
    icon: string,
  ): boolean {
    return (
      icon.startsWith(
        'heroicon-',
      )
    )
  }

  resolve(
    icon: string,
  ): IconComponent | null {
    /*
     * Supported formats:
     *
     * heroicon-o-home
     * heroicon-o-users
     * heroicon-o-cog-6-tooth
     *
     * heroicon-s-home
     * heroicon-m-home
     *
     * The style prefix is currently
     * normalized because the Runtime
     * uses Lucide as the rendering
     * implementation for these aliases.
     */
    const name =
      icon.replace(
        /^heroicon-[osm]-/,
        '',
      )

    return (
      icons[name] ?? null
    )
  }
}