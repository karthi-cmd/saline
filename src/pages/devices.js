import {
  Button,
  FormHelperText,
  Grid,
  Paper,
  TextField,
} from '@mui/material';
import { Container } from '@mui/system';

import { collectionId, db, dbId } from '../service/appwrite-config';
import { v4 as uuid } from 'uuid';
import { React, useState, useEffect } from 'react';

import Table from "@material-ui/core/Table";
import TableBody from "@material-ui/core/TableBody";
import TableCell from "@material-ui/core/TableCell";
import TableContainer from "@material-ui/core/TableContainer";
import TableHead from "@material-ui/core/TableHead";
import TableRow from "@material-ui/core/TableRow";
import Paper from "@material-ui/core/Paper";

const StyledTableCell = withStyles((theme) => ({
  head: {
    backgroundColor: theme.palette.common.black,
    color: theme.palette.common.white,
  },
  body: {
    fontSize: 14,
  },
}))(TableCell);

const StyledTableRow = withStyles((theme) => ({
  root: {
    "&:nth-of-type(odd)": {
      backgroundColor: theme.palette.action.hover,
    },
  },
}))(TableRow);

const useStyles = makeStyles({
  table: {
    minWidth: 700,
  },
});
useEffect(() => {
  getProductData();
}, []);

// import * as React from 'react';
import { styled } from '@mui/material/styles';
import Dialog from '@mui/material/Dialog';
import DialogTitle from '@mui/material/DialogTitle';
import DialogContent from '@mui/material/DialogContent';
import IconButton from '@mui/material/IconButton';
import CloseIcon from '@mui/icons-material/Close';

const BootstrapDialog = styled(Dialog)(({ theme }) => ({
  '& .MuiDialogContent-root': {
    padding: theme.spacing(2),
  },
  '& .MuiDialogActions-root': {
    padding: theme.spacing(1),
  },
}));


function BootstrapDialogTitle(props) {
  
  const { children, onClose, ...other } = props;

  return (
    <DialogTitle sx={{ m: 0, p: 2 }} {...other}>
      {children}
      {onClose ? (
        <IconButton
          aria-label="close"
          onClick={onClose}
          sx={{
            position: 'absolute',
            right: 8,
            top: 8,
            color: (theme) => theme.palette.grey[500],
          }}
        >
          <CloseIcon />
        </IconButton>
      ) : null}
    </DialogTitle>
  );
}


export default function Devices() {
  const [documents, setDocuments] = useState(null);
  const [product, setProduct] = useState([]);
  // const history = useHistory();
  const [open, setOpen] = useState(false);


  const getDocuments = async () => {
    const res = await db.listDocuments(dbId, collectionId);
    console.log(res);
    setDocuments(res.documents);
    console.log(documents); 
  };

  const handleClickOpen = () => {
    setOpen(true);
  };
  const handleClose = () => {
    setOpen(false);
  };
  

  return (
    <div>

      <Button variant="outlined" onClick={handleClickOpen} >
        Add Device
      </Button>
      <BootstrapDialog
       
        aria-labelledby="customized-dialog-title"
        open={open}
      >
        <BootstrapDialogTitle id="customized-dialog-title" onClose={handleClose}>
          Add Device
        </BootstrapDialogTitle>
        <DialogContent dividers>
          <PopUpForm />
        </DialogContent>
        
      </BootstrapDialog> 
    </div>
  );
};

const PopUpForm = () => {
  const [deviceDetails, setDeviceDetails] = useState({
    deviceId: "",
    deviceName: "",
    description: ""
  });

  const add = async (e) => {
    e.preventDefault();

    const promise = db.createDocument(dbId, collectionId, uuid(), {
      ...deviceDetails,
    });

    promise.then(function (response) {
      console.log(response); // Success
    }, function (error) {
      console.log(error); // Failure
    });
  };

  return(
    <div>
      <Container maxWidth="sm">
        <Grid
          container
          spacing={2}
          direction="column"
          justifyContent="center"
          style={{ minHeight: "50vh" }}

        >
          <Paper elevation={0} sx={{ padding: 5 }}>
            <Grid container direction="column" spacing={1}>
              <Grid item>
                <FormHelperText>Device ID</FormHelperText>
                <TextField
                  onChange={(e) => {
                    setDeviceDetails({
                      ...deviceDetails,
                      deviceId: e.target.value,
                    });
                  }}
                  type="number"
                  fullWidth
                  placeholder='Enter device id '
                  variant='outlined'
                >

                </TextField>
              </Grid>
              <Grid item>
                <FormHelperText>Device Name</FormHelperText>
                <TextField
                  onChange={(e) => {
                    setDeviceDetails({
                      ...deviceDetails,
                      deviceName: e.target.value,
                    });
                  }}
                  type="text"
                  fullWidth
                  placeholder='Enter device name'
                  variant='outlined'
                >
                </TextField>
              </Grid>
              <Grid item>
                <FormHelperText>Description</FormHelperText>
                <TextField
                  onChange={(e) => {
                    setDeviceDetails({
                      ...deviceDetails,
                      description: e.target.value,
                    });
                  }}
                  type="email"
                  fullWidth
                  placeholder='Description'
                  variant='outlined'
                >

                </TextField>
              </Grid>

              <Grid item>
                <Button variant="contained" type="button" onClick={(e) => add(e)} >Save</Button>

              </Grid>
            </Grid>
          </Paper>
        </Grid>

      </Container>
    </div>
  );
}