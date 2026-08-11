import type { ApplicationApi } from '@/runtime/API/ApplicationApi'

export interface RuntimeOptions {
  application: string
  applicationApi: ApplicationApi
}

export class Runtime {
  readonly application: string
  readonly applicationApi: ApplicationApi

  constructor(options: RuntimeOptions) {
    this.application = options.application
    this.applicationApi = options.applicationApi
  }
}
