import React from 'react'
import { Navigate } from 'react-router-dom'
import { useAuthStore } from '../stores/authStore'

export default function ProtectedRoute({ children }){
  const user = useAuthStore(s => s.user)
  if (!user) return <Navigate to="/admin/login" replace />
  return children
}
