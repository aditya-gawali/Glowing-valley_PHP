import React, { useState } from 'react'
import api from '../services/api'

export default function NewProduct(){
  const [form, setForm] = useState({ name: '', uses: '', weight: '', prices: '', category: 1 })
  const [image, setImage] = useState(null)

  const handleSubmit = async (e) => {
    e.preventDefault()
    const fd = new FormData()
    fd.append('name', form.name)
    fd.append('uses', form.uses)
    fd.append('weight', form.weight)
    fd.append('prices', form.prices)
    fd.append('category', form.category)
    if (image) fd.append('image', image)
    try{
      await api.post('/admin/products', fd, { headers: { 'Content-Type': 'multipart/form-data' }})
      alert('Product created (dummy)')
      setForm({ name: '', uses: '', weight: '', prices: '', category: 1 })
      setImage(null)
    }catch(e){ console.error(e); alert('Failed to create product') }
  }

  return (
    <div className="p-4 rounded bg-white shadow">
      <h2 className="text-xl font-bold mb-4">Add New Product</h2>
      <form onSubmit={handleSubmit} className="space-y-3">
        <input value={form.name} onChange={e => setForm({...form, name: e.target.value})} placeholder="Name" className="w-full p-2 border" />
        <textarea value={form.uses} onChange={e => setForm({...form, uses: e.target.value})} placeholder="Uses" className="w-full p-2 border" />
        <input value={form.weight} onChange={e => setForm({...form, weight: e.target.value})} placeholder="Weight (comma separated)" className="w-full p-2 border" />
        <input value={form.prices} onChange={e => setForm({...form, prices: e.target.value})} placeholder="Prices (comma separated)" className="w-full p-2 border" />
        <select value={form.category} onChange={e => setForm({...form, category: Number(e.target.value)})} className="w-full p-2 border">
          <option value={1}>Beauty</option>
          <option value={2}>Hamper</option>
        </select>
        <input type="file" onChange={e => setImage(e.target.files[0])} />
        <button className="px-3 py-2 bg-[#041e42] text-white" type="submit">Create</button>
      </form>
    </div>
  )
}
