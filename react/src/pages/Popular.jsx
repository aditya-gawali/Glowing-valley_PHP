import React, { useEffect, useState } from 'react'
import ProductCard from '../components/ProductCard'
import { useProductStore } from '../stores/productStore'

export default function Popular(){
  const fetchProducts = useProductStore(s => s.fetchProducts)
  const [products, setProducts] = useState([])

  useEffect(() => {
    let mounted = true
    fetchProducts({ popular: 1 }).then(d => mounted && setProducts(d))
    return () => { mounted = false }
  }, [fetchProducts])

  return (
    <section className="px-5 md:px-20 py-8">
      <h1 className="text-center text-2xl md:text-3xl font-bold py-4">Popular Now</h1>
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mx-auto">
        {products.map(p => <ProductCard key={p.id} product={p} />)}
      </div>
    </section>
  )
}
