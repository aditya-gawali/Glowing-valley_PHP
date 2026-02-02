import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom'
import api from '../services/api'
import { useCartStore } from '../stores/cartStore'

export default function Product(){
  const { id } = useParams()
  const [product, setProduct] = useState(null)
  const add = useCartStore(s => s.add)

  useEffect(() => {
    let mounted = true
    api.get(`/products/${id}`).then(r => mounted && setProduct(r.data)).catch(console.error)
    return () => { mounted = false }
  }, [id])

  if (!product) return <div>Loading...</div>
  return (
    <section>
      <h1>{product.name}</h1>
      <p>{product.description}</p>
      <button onClick={() => add(product)}>Add to cart</button>
    </section>
  )
}
