import axios from 'axios'

// Using a dummy API base URL for now. Replace via VITE_API_BASE_URL in production/dev env.
const api = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL || 'https://api.example.com',
  headers: { 'Content-Type': 'application/json' }
})

export default api
