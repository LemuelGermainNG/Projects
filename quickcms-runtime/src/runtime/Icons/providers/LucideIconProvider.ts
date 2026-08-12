import {
  Activity,
  Archive,
  ArrowDown,
  ArrowLeft,
  ArrowRight,
  ArrowUp,
  Bell,
  BookOpen,
  Box,
  Calendar,
  Check,
  ChevronDown,
  ChevronLeft,
  ChevronRight,
  ChevronUp,
  Circle,
  CircleHelp,
  Clipboard,
  Clock,
  Code,
  Database,
  Download,
  Edit,
  ExternalLink,
  Eye,
  File,
  FileText,
  Folder,
  FolderOpen,
  Globe,
  Grid2X2,
  Home,
  Info,
  LayoutDashboard,
  List,
  Lock,
  LogIn,
  LogOut,
  Mail,
  Menu,
  MessageCircle,
  MoreHorizontal,
  MoreVertical,
  Package,
  Pencil,
  Plus,
  RefreshCw,
  Search,
  Server,
  Settings,
  Shield,
  Trash,
  Upload,
  User,
  UserCircle,
  Users,
  X,
  XCircle,
  type LucideIcon,
} from 'lucide-react'

import type {
  IconComponent,
  IconProvider,
} from '../IconProvider'

const icons: Record<
  string,
  LucideIcon
> = {
  activity: Activity,
  archive: Archive,
  'arrow-down': ArrowDown,
  'arrow-left': ArrowLeft,
  'arrow-right': ArrowRight,
  'arrow-up': ArrowUp,
  bell: Bell,
  'book-open': BookOpen,
  box: Box,
  calendar: Calendar,
  check: Check,
  'chevron-down': ChevronDown,
  'chevron-left': ChevronLeft,
  'chevron-right': ChevronRight,
  'chevron-up': ChevronUp,
  circle: Circle,
  'circle-help': CircleHelp,
  clipboard: Clipboard,
  clock: Clock,
  code: Code,
  database: Database,
  download: Download,
  edit: Edit,
  'external-link': ExternalLink,
  eye: Eye,
  file: File,
  'file-text': FileText,
  folder: Folder,
  'folder-open': FolderOpen,
  globe: Globe,
  'grid-2x2': Grid2X2,
  home: Home,
  info: Info,
  'layout-dashboard': LayoutDashboard,
  list: List,
  lock: Lock,
  'log-in': LogIn,
  'log-out': LogOut,
  mail: Mail,
  menu: Menu,
  'message-circle': MessageCircle,
  'more-horizontal': MoreHorizontal,
  'more-vertical': MoreVertical,
  package: Package,
  pencil: Pencil,
  plus: Plus,
  'refresh-cw': RefreshCw,
  search: Search,
  server: Server,
  settings: Settings,
  shield: Shield,
  trash: Trash,
  upload: Upload,
  user: User,
  'user-circle': UserCircle,
  users: Users,
  x: X,
  'x-circle': XCircle,
}

export class LucideIconProvider
  implements IconProvider
{
  readonly name = 'lucide'

  supports(
    icon: string,
  ): boolean {
    return icon.startsWith(
      'lucide-',
    )
  }

  resolve(
    icon: string,
  ): IconComponent | null {
    const name =
      icon
        .replace(
          /^lucide-/,
          '',
        )
        .toLowerCase()

    return (
      icons[name] ?? null
    )
  }
}