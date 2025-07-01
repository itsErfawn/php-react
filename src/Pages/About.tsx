import { usePage } from '@inertiajs/inertia-react'
import React from 'react'

interface Props {
  info: string
}

export default function About({ info }: Props) {
  return (
    <div >
      <h1 className='bg-blue-500'>درباره ما</h1>
      <p>{info}</p>
    </div>
  )
}
