import React from 'react';
import Box from '@mui/material/Box';
import Card from '@mui/material/Card';
import CardContent from '@mui/material/CardContent';
import Typography from '@mui/material/Typography';
import { Link } from 'react-router-dom';


const card = ({deviceId, deviceName}) => {
  return(
  <>
    <CardContent >
      <Typography sx={{ fontSize: 50 }} color="text.secondary" gutterBottom>
        {deviceId}
      </Typography>
      <Typography variant="h5" component="div">
        {deviceName}
      </Typography>
    </CardContent>
  </>
  )
};

export default function OutlinedCard({deviceId, deviceName}) {
  return (
    // <Link to={`/devices/${user.id}`}>
   <Box sx={{width:300}}
   >
      <Card deviceId={deviceId} deviceName={deviceName}>{card}</Card>
    </Box>
    // </Link>
  );
}