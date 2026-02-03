import React, { useState } from 'react'
import api from '../services/api'

export default function Contact(){
  const [form, setForm] = useState({ first_name: '', last_name: '', email: '', phone_number: '' })
  const [status, setStatus] = useState(null)

  const submit = async (e) => {
    e.preventDefault()
    try{
      await api.post('/contact', form)
      setStatus('Message sent successfully')
      setForm({ first_name: '', last_name: '', email: '', phone_number: '' })
    }catch(e){ console.error(e); setStatus('Failed to send') }
  }

  return (
    <div className="mx-auto max-w-7xl px-4">
      <div className="mx-auto max-w-7xl py-12 md:py-24">
        <div className="grid items-center justify-items-center gap-x-4 gap-y-10 lg:grid-cols-2">
          <div className="flex items-center justify-center">
            <div className="px-2 md:px-12">
              <p className="text-2xl font-bold text-gray-900 md:text-4xl">Get in touch</p>
              <p className="mt-4 text-lg text-gray-600">Our friendly team would love to hear from you.</p>
              {status && <p className="mt-4 text-lg text-gray-600">{status}</p>}
              <form onSubmit={submit} className="mt-8 space-y-4">
                <div className="grid w-full gap-y-4 md:gap-x-4 lg:grid-cols-2">
                  <input value={form.first_name} onChange={e => setForm({...form, first_name: e.target.value})} placeholder="First Name" className="w-full p-2 border" />
                  <input value={form.last_name} onChange={e => setForm({...form, last_name: e.target.value})} placeholder="Last Name" className="w-full p-2 border" />
                </div>
                <input value={form.email} onChange={e => setForm({...form, email: e.target.value})} placeholder="Email" className="w-full p-2 border" />
                <input value={form.phone_number} onChange={e => setForm({...form, phone_number: e.target.value})} placeholder="Phone number" className="w-full p-2 border" />
                <button type="submit" className="w-full rounded-md bg-[#041e42] px-3 py-2 text-sm font-semibold text-white">Send Message</button>
              </form>
            </div>
          </div>
          <img alt="Contact us" className="hidden max-h-full w-full rounded-lg object-cover lg:block" src="https://images.unsplash.com/photo-1543269664-56d93c1b41a6?auto=format&fit=crop&w=800&q=60" />
        </div>
      </div>
    </div>
  )
}
