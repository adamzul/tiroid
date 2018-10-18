pipeline {
  agent {
    docker {
      image 'php'
    }

  }
  stages {
    stage('build') {
      steps {
        bat 'php --version'
        sh 'composer install'
      }
    }
  }
}