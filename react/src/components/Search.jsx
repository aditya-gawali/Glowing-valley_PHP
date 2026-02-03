import React, { useState, useEffect, useRef } from 'react'
import { useProductStore } from '../stores/productStore'
import { Link } from 'react-router-dom'

export default function Search(){
  const [open, setOpen] = useState(false)
  const [query, setQuery] = useState('')
  const [results, setResults] = useState([])
  const { searchProducts } = useProductStore()
  const timeoutRef = useRef(null)

  useEffect(() => {
    if (!open) return
    if (query.length < 2) { setResults([]); return }
    clearTimeout(timeoutRef.current)
    timeoutRef.current = setTimeout(async () => {
      const res = await searchProducts(query)
      setResults(res)
    }, 300)
  }, [query, open, searchProducts])

  return (
    <div>
      <button onClick={() => setOpen(true)} className="ri-search-line" aria-label="Open search"></button>

      {open && (
        <div className="fixed inset-0 z-50 bg-black bg-opacity-80 p-6 overflow-auto">
          <div className="flex justify-between items-center">
            <div className="flex items-center gap-4 w-full">
              <input autoFocus value={query} onChange={(e) => setQuery(e.target.value)} className="w-full py-3 text-xl" placeholder="Search for products..." />
            </div>
            <button onClick={() => setOpen(false)} className="ri-close-line text-white text-2xl ml-4" />
          </div>

          <div className="mt-4 bg-white text-black rounded-lg p-4">
            {results.length === 0 && query.length >= 2 && <div className="text-xl">No Product Found</div>}
            {results.map(p => (
              <Link to={`/product/${p.id}`} key={p.id} onClick={() => setOpen(false)} className="block border-b border-black px-6 text-xl py-2">{p.name}</Link>
            ))}
          </div>
        </div>
      )}
    </div>
  )
}
