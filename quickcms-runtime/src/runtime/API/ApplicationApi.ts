import type {
  ApplicationSchemaResponse,
} from '@/runtime/Contracts/Application'

import { ApiClient } from './ApiClient'

export class ApplicationApi {
  constructor(
    private readonly client: ApiClient,
  ) {}

  getSchema(
    application: string,
    signal?: AbortSignal,
  ) {
    return this.client.get<ApplicationSchemaResponse>(
      `/applications/${encodeURIComponent(application)}/schema`,
      signal,
    )
  }
}