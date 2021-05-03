class Node
  attr_accessor :value, :parent, :left, :right

  def initialize(value, parent: nil)
    @value = value
    @parent = parent
  end

  def add_child(child_value)
    if child_value < value
      return self.left = Node.new(child_value) if left.nil?

      left.add_child(child_value)
    else
      return self.right = Node.new(child_value) if right.nil?

      right.add_child(child_value)
    end
  end

  def to_s
    "#{left} #{value} #{right}".strip
  end
end

class BinaryTree
  attr_accessor :root

  def initialize
    @root = nil
  end

  def add(value)
    # save navigation operator
    @root&.add_child(value)
    @root = Node.new(value) if @root.nil?
  end

  def to_s
    @root.to_s
  end
end
