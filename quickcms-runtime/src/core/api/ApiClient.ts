export interface ApiClientOptions {
  baseUrl: string
  credentials?: RequestCredentials
}

export class ApiClient {
  private readonly baseUrl: string
  private readonly credentials: RequestCredentials

  constructor(options: ApiClientOptions) {
    this.baseUrl = options.baseUrl.replace(/\/$/, '')
    this.credentials = options.credentials ?? 'include'
  }

  async get<T>(path: string, signal?: AbortSignal): Promise<T> {
    const response = await fetch(`${this.baseUrl}${path}`, {
      method: 'GET',
      credentials: this.credentials,
      headers: { Accept: 'application/json' },
      signal,
    })

    if (!response.ok) {
      throw new Error(`API request failed with status ${response.status}.`)
    }

    return response.json() as Promise<T>
  }
}
