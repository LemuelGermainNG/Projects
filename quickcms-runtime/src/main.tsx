import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import '@/styles/globals.css'
import App from './App'
import { bootstrap } from '@/app/bootstrap/bootstrap'
import { AppProvider } from '@/app/providers/AppProvider'

const { queryClient, api } = bootstrap()

createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <AppProvider queryClient={queryClient} api={api}>
      <App />
    </AppProvider>
  </StrictMode>,
)
