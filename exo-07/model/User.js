import mongoose from 'mongoose';
import passportLocalMongoose from 'passport-local-mongoose';


const User = new mongoose.Schema({ role: Number }, { timestamps: true });

User.plugin(passportLocalMongoose);


export default mongoose.model('User', User);
