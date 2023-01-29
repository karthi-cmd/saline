import React from 'react';
import InputLabel from '@mui/material/InputLabel';
import MenuItem from '@mui/material/MenuItem';
import FormControl from '@mui/material/FormControl';
import Select, { SelectChangeEvent } from '@mui/material/Select';
import FormHelperText from '@mui/material/FormHelperText';
import {
    Button,
    Grid,
    Paper,
    TextField,
} from '@mui/material';
import { Container } from '@mui/system';
import { useForm } from "react-hook-form";

export default function Variables() {
    const { register, handleSubmit, formState: { errors } } = useForm();
    const onSubmit = (data) => console.log(data);
    console.log(errors);
    const [age, setAge] = React.useState('');


    const handleChange = (event) => {
        setAge(event.target.value);
    };

    return (
        <div>
            <form onSubmit={handleSubmit(onSubmit)}>
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
                                    <FormHelperText>Variable Name</FormHelperText>
                                    <FormControl fullWidth
                                    >
                                        <InputLabel>select *</InputLabel>


                                        <Select

                                            value={age}
                                            onChange={handleChange}
                                            fullWidth
                                            label="select"
                                            variant='outlined'

                                        >


                                            <MenuItem value="" >
                                                <em>None</em>
                                            </MenuItem>
                                            <MenuItem value={1}>DPM</MenuItem>
                                            <MenuItem value={2}>Capacity</MenuItem>
                                            <MenuItem value={3}>Battery level</MenuItem>
                                            <MenuItem value={4}>Room temperature</MenuItem>

                                        </Select>
                                        <FormHelperText>Required</FormHelperText>
                                    </FormControl>
                                </Grid>
                                <Grid item>
                                    <FormHelperText>Variable Unit</FormHelperText>
                                    <TextField
                                        type="text"
                                        fullWidth
                                        placeholder="Enter unit"
                                        variant='outlined'
                                        name="var"
                                        {...register("var", { required: "unit is required." })}
                                        error={Boolean(errors.var)}
                                        helperText={errors.var?.message}
                                    >

                                    </TextField>
                                </Grid>
                                <Grid item>
                                    <FormHelperText>Description</FormHelperText>
                                    <TextField
                                        type="text"
                                        fullWidth
                                        placeholder='Description'
                                        variant='outlined'
                                        name="desc"
                                        {...register("desc", { required: "desc is required." })}
                                        error={Boolean(errors.desc)}
                                        helperText={errors.desc?.message}
                                    >

                                    </TextField>
                                </Grid>

                                <Grid item>
                                    <Button variant="contained" color="primary" type="submit" className="btns">
                                        save
                                    </Button>

                                </Grid>



                            </Grid>

                        </Paper>
                    </Grid>

                </Container>
            </form>
        </div>
    );
}