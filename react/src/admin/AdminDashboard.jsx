import React from 'react'
import AdminProducts from './AdminProducts'

export default function AdminDashboard(){
  return (
    <div className="p-6">
      <h1 className="text-2xl font-bold mb-4">Dashboard</h1>
      <AdminProducts />
    </div>
  )
}
