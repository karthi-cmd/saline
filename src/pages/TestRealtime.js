import React from 'react'
import { client } from '../service/appwrite-config';

function TestRealtime() {
    client.subscribe('databases.*.collections.*.documents', response => {
            // Log when a new file is uploaded
            console.log(response);
    });
  return (
    <div>TestRealtime</div>
  )
}

export default TestRealtime