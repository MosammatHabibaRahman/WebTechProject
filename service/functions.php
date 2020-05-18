<?php
	require('db.php');

	function browseCourse($txt,$category)
	{
		$con = getConnection();
		$sql = "";

		if($category == "All Courses" && trim($txt) == "")
		{
			$sql = "select courses.c_id, courses.course_name,courses.no_of_classes,courses.course_type,courses.avg_rating,courses.status,courses.category,teachers.username from courses,teachers where courses.t_id = teachers.t_id";
		}
		else if($category == "All Courses" && trim($txt) != "")
		{
			$sql = "select courses.c_id, courses.course_name,courses.no_of_classes,courses.course_type,courses.avg_rating,courses.status,courses.category,teachers.username from courses,teachers where courses.t_id = teachers.t_id and courses.course_name like '{$txt}%'";
		}
		else
		{
			$sql = "select courses.c_id, courses.course_name,courses.no_of_classes,courses.course_type,courses.avg_rating,courses.status,courses.category,teachers.username from courses,teachers where courses.t_id = teachers.t_id and courses.course_name like '{$txt}%' and courses.category = '{$category}'";
		}
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function cancelPrm($id)
	{
		$con = getConnection();
		$sql = "update students set usertype = 'Basic Student' where s_id = {$id}";
		
		if(mysqli_query($con, $sql))
		{
			$result = "Password Successfully updated!";
		}
		else
		{
			$result = "Error";
		}

		return $result;
	}

	function checkIfEnrolled($id,$c_id)
	{
		$con = getConnection();
		$sql = "select * from student_list where s_id = {$id} and c_id = {$c_id}";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);

		if($row != NULL)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function countRows($result)
	{
		$count = mysqli_num_rows($result);
		return $count;
	}

	function countStudentsInCourse($c_id)
	{
		$con = getConnection();
		$sql = "select COUNT(s_id) as count FROM student_list WHERE c_id = {$c_id}";
		$result = mysqli_query($con, $sql);
		$count = mysqli_fetch_assoc($result);
		return $count;
	}

	function createBookmark($id,$l_id)
	{
		$con = getConnection();
		$sql = "insert into bookmarks values(null,{$id},{$l_id})";

		if(mysqli_query($con, $sql))
		{
			$result = "This lecture has been successfully bookmarked!";
		}
		else
		{
			$result = "Error";
		}

		return $result;
	}

	function deleteBookmark($b_id)
	{
		$con = getConnection();
		$sql = "delete from bookmarks where b_id = {$b_id}";

		if(mysqli_query($con, $sql))
		{
			$result = "Bookmark removed.";
		}
		else
		{
			$result = "Error";
		}

		return $result;
	}

	function deleteStudent($id)
	{
		$con = getConnection();
		$sql = "delete from students where s_id = {$id}";

		if(mysqli_query($con, $sql))
		{
			$result = "Account successfully deleted.";
		}
		else
		{
			$result = "Error";
		}

		return $result;
	}

	function dropCourse($id,$c_id)
	{
		$con = getConnection();
		$sql = "delete from student_list where c_id = {$c_id} and s_id = {$id}";
		
		if(mysqli_query($con, $sql))
		{
			$result = "Course Dropped!";
		}
		else
		{
			$result = "Error";
		}

		return $result;
	}
	
	function fetch($result)
	{
		$count = countRows($result);
		$i=0;
		while($i<$count)
		{
			$rows[$i] = mysqli_fetch_assoc($result);
			$i++;
		}

		if($count>0)
		{
			return $rows;
		}
	}

	function FindBookmark($id, $l_id)
	{
		$con = getConnection();
		$sql = "select * from bookmarks where s_id = {$id} and l_id = {$l_id}";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function getAllLectures($c_id)
	{
		$con = getConnection();
		$sql = "select courses.course_name,lectures.l_id,lectures.c_id,lectures.lecture_name from lectures,courses where lectures.c_id = courses.c_id and lectures.c_id = {$c_id}";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function getAllUsers()
	{
		$con = getConnection();
		$sql = "select * from students";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function getSelectedCourse($c_id)
	{
		$con = getConnection();
		$sql = "select courses.c_id,courses.course_name,courses.no_of_classes,courses.course_type,courses.avg_rating,courses.status,courses.category,teachers.username from courses,teachers where courses.t_id = teachers.t_id and courses.c_id = {$c_id}";
		$result = mysqli_query($con, $sql);
		$course = mysqli_fetch_assoc($result);

		return $course;
	}

	function getSelectedLecture($l_id)
	{
		$con = getConnection();
		$sql = "select * from lectures where l_id = {$l_id}";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function getSelectedUser($id)
	{
		$con = getConnection();
		$sql = "select * from students where s_id = {$id}";
		$result = mysqli_query($con, $sql);
		$user = mysqli_fetch_assoc($result);

		return $user;
	}

	function getStudentCourses($id)
	{
		$con = getConnection();
		$sql = "select student_list.c_id,courses.course_name,courses.no_of_classes,courses.course_type,courses.avg_rating,courses.status,courses.category from student_list,courses where student_list.c_id = courses.c_id and student_list.s_id = {$id}";
		$result = mysqli_query($con, $sql);
		

		return $result;
	}

	function getUserBookmarks($id)
	{
		$con = getConnection();
		$sql = "select bookmarks.l_id,lectures.lecture_name from bookmarks,lectures where s_id = {$id} and bookmarks.l_id = lectures.l_id";
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function joinCourse($id,$c_id)
	{
		$con = getConnection();
		$sql = "insert into student_list values (null,{$c_id},{$id})";
		
		if(mysqli_query($con, $sql))
		{
			$result = "Course Joined!";
		}
		else
		{
			$result = "Error";
		}

		return $result;
	}

	function register($username, $email, $password, $gender, $cardno, $expdate, $code, $usertype, $propic)
	{
		$con = getConnection();
		$sql = "insert into students values (null,'{$username}', '{$email}', '{$password}', '{$gender}', '{$cardno}', '{$expdate}', '{$code}', '{$usertype}', '{$propic}')";
		
		if(mysqli_query($con, $sql))
		{
			$result = "Registration done!";
		}
		else
		{
			$result = "Error";
		}

		return $result;
	}

	function searchTeacher($alpha,$txt)
	{
		$con = getConnection();
		$sql = "";

		if($alpha == "All Teachers" && trim($txt) == "")
		{
			$sql = "select teachers.t_id,teachers.username,courses.t_id,courses.c_id,courses.course_name from teachers,courses where teachers.t_id = courses.t_id order by teachers.username";
		}
		else if($alpha == "All Teachers" && trim($txt) != "")
		{
			$sql = "select teachers.t_id,teachers.username,courses.t_id,courses.c_id,courses.course_name from teachers,courses where teachers.t_id = courses.t_id and teachers.username like '{$txt}%'";
		}
		else
		{
			$sql = "select teachers.t_id,teachers.username,courses.t_id,courses.c_id,courses.course_name from teachers,courses where teachers.t_id = courses.t_id and teachers.username like '{$txt}%' and teachers.username LIKE '{$alpha}%'";
		}
		$result = mysqli_query($con, $sql);
		return $result;
	}

	function updatePassword($id,$password)
	{
		$con = getConnection();
		$sql = "update students set password = {$password} where s_id = {$id}";
		
		if(mysqli_query($con, $sql))
		{
			$result = "Password Successfully updated!";
		}
		else
		{
			$result = "Error";
		}

		return $result;
	}

	function updateStudent($id,$username, $email, $gender, $cardno, $expdate, $code)
	{
		$con = getConnection();
		$sql = "update students set username = '{$username}', email = '{$email}', gender = '{$gender}', `card no` = '{$cardno}', expdate = '{$expdate}', code = '{$code}' where s_id = {$id}";
		
		if(mysqli_query($con, $sql))
		{
			$result = "Student info successfully updated!";
		}
		else
		{
			$result = "Error";
		}

		return $result;
	}

	function updateProPic($id, $propic)
	{
		$con = getConnection();
		$sql = "update students set propic = '{$propic}' where s_id = {$id}";
		
		if(mysqli_query($con, $sql))
		{
			$result = "Image successfully uploaded/added!";
		}
		else
		{
			$result = "Error";
		}

		return $result;
	}

	function validate($username, $password)
	{
		$con = getConnection();
		$sql = "select * from students where username='{$username}' and password='{$password}'";
		$result = mysqli_query($con, $sql);
		$user = mysqli_fetch_assoc($result);

		return $user;
	}
?>