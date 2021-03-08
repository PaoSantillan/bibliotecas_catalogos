<!-- fragment 1 -->
<select class="form-control form-select" name="course_id" id="cursoMatricula" aria-label="Default select example" aria-describedby="cursoMatriculaHelp" required>
                    @foreach($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->name}}</option>
                    @endforeach
                </select>