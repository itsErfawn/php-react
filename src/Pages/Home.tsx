import { Link, usePage } from '@inertiajs/inertia-react';
import React from 'react';

interface Props {
  message: string;
}

export default function Home({ message }: Props) {
  const {data}=usePage().props
  console.log(data);
  return (
    <div>
      <h1 className='bg-red-400 text-white'>{message}</h1>
      <p>Welcome to Inertia + PHP MVC + TypeScript setup</p>
      <Link href="/about">go to about</Link>
      <p>sss</p>
    </div>
  );
}
