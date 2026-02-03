import React, { useState } from 'react'
import { useAuthStore } from '../stores/authStore'
import { useNavigate } from 'react-router-dom'

export default function AdminLogin(){
  const [form, setForm] = useState({ username: '', password: '' })
  const setUser = useAuthStore(s => s.setUser)
  const navigate = useNavigate()

  const submit = (e) => {
    e.preventDefault()
    // dummy login - in real app call API
    setUser({ username: form.username }, 'dummy-token')
    navigate('/admin')
  }

  return (
    <div className="max-w-md mx-auto p-6">
      <h2 className="text-2xl font-bold mb-4">Admin Login</h2>
      <form onSubmit={submit} className="space-y-3">
        <input value={form.username} onChange={e => setForm({...form, username: e.target.value})} placeholder="Username" className="w-full p-2 border" />
        <input type="password" value={form.password} onChange={e => setForm({...form, password: e.target.value})} placeholder="Password" className="w-full p-2 border" />
        <button className="px-3 py-2 bg-[#041e42] text-white">Login</button>
      </form>
    </div>
  )
}
