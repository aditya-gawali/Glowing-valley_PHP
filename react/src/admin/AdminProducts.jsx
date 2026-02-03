import React, { useEffect, useState } from 'react'
import api from '../services/api'

export default function AdminProducts(){
  const [products, setProducts] = useState([])

  useEffect(() => {
    let mounted = true
    api.get('/admin/products').then(r => mounted && setProducts(r.data)).catch(() => {
      // fallback to /products
      api.get('/products').then(r => mounted && setProducts(r.data)).catch(console.error)
    })
    return () => { mounted = false }
  }, [])

  return (
    <div className="rounded bg-white p-4 shadow">
      <h4 className="text-xl font-bold mb-4">All Products</h4>
      <table className="w-full table-auto">
        <thead>
          <tr className="bg-gray-100 text-left">
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Weight</th>
            <th>Prices</th>
          </tr>
        </thead>
        <tbody>
          {products.map(p => (
            <tr key={p.id}>
              <td><img src={p.image} alt={p.name} style={{width:80}} /></td>
              <td>{p.name}</td>
              <td>{p.category === 1 ? 'Beauty' : 'Hamper'}</td>
              <td>{p.weight}</td>
              <td>{p.prices}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  )
}
